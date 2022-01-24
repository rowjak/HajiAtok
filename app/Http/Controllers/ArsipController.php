<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Validator;
use Auth;
use Storage;
use DB;
use App\Models\{TipeArsip,Arsip};
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'nama_arsip' => 'required',
            'keterangan' => 'required',
            'kd_tipe_arsip' => 'required',
            'jenis' => 'required',
            'nama_file'=>'required|mimes:jpeg,jpg,png,pdf,zip,rar,7z,doc,docx,xls,xlsx,ppt,pptx|max:25000'
        ]);

        if ($validasi->fails())
        {
            $error = '';

            foreach($validasi->errors()->all() as $row){
                $error .= '<li>'.$row.'</li>';
            }

            return response()->json([
                'status' => false,
                'message' => '<div class="alert alert-danger" role="alert">
                <div class="alert-message">
                    '.$error.'
                </div>
            </div>'
            ],200);
        }


        if ($request->file('nama_file')->isValid())
        {
            $tipe_arsip = TipeArsip::select('uri','nama_tipe_arsip')->findOrFail($data['kd_tipe_arsip']);
            $file = $request->file('nama_file');
            $extention = $file->getClientOriginalExtension();

            $namaFile = 'arsip/'.$tipe_arsip->uri.'/'.$data['nama_arsip'].'-'.uniqid().'.'.$extention;

            $uploadPath = 'uploads/arsip/'.$tipe_arsip->uri;
            $file->move($uploadPath,$namaFile);
            $data['nama_file'] = $namaFile;
        }

        $data['kd_user'] = Auth::user()->kd_user;
        Arsip::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Arsip '.$tipe_arsip->nama_tipe_arsip.' Berhasil di Unggah'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unduh($kd_arsip){
        $arsip = Arsip::findOrFail($kd_arsip);

        try {
            $pathToFile = public_path('uploads/'.$arsip->nama_file);
            return response()->download($pathToFile);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }

    public function search(Request $request){

        if ($request->ajax()) {
            $data = DB::table('arsip')
                ->join('tipe_arsip','arsip.kd_tipe_arsip','=','tipe_arsip.kd_tipe_arsip')
                ->join('users','arsip.kd_user','=','users.kd_user')
                ->select('arsip.*','tipe_arsip.nama_tipe_arsip','tipe_arsip.uri','users.nama_pegawai')
                ->orderBy('created_at','desc');
            return DataTables::of($data)
                ->filter(function ($query) {
                    if (request()->has('keyword')) {
                        if (request('keyword') != "") {
                            if (strpos(request('keyword'), ' ') == true) {
                                $search = explode(' ',request('keyword'));
                                foreach ($search as $key) {
                                    $query->where(DB::raw('concat_ws(arsip.nama_arsip," ",arsip.keterangan," ",arsip.tahun," ",arsip.jenis," ",tipe_arsip.nama_tipe_arsip," ",tipe_arsip.uri," ",users.nama_pegawai)') , 'LIKE' , '%'.$key.'%');
                                }
                            }else{
                                $query->where(DB::raw('concat_ws(arsip.nama_arsip," ",arsip.keterangan," ",arsip.tahun," ",arsip.jenis," ",tipe_arsip.nama_tipe_arsip," ",tipe_arsip.uri," ",users.nama_pegawai)') , 'LIKE' , '%'.request('keyword').'%');
                            }
                        }
                    }
                })
                ->addIndexColumn()
                ->addColumn('tgl_upload',function($data){
                    return tanggal_indo(date('Y-m-d',strtotime($data->created_at))).',<br/>'.date('H:i:s',strtotime($data->created_at));
                })
                ->editColumn('keterangan',function($data){
                    return nl2br($data->keterangan);
                })
                ->editColumn('nama_tipe_arsip',function($data){
                    return '<a href="'.route('arsip.show',$data->uri).'" target="_blank">'.$data->nama_tipe_arsip.'</a>';
                })
                ->addColumn('unduh',function($data){
                    return '<a data-toggle="tooltip" data-placement="top"  title="Unduh Berkas"  style="font-size: 12sp !important" href="'.route('arsip.unduh',$data->kd_arsip).'" class="btn btn-success text-white py-1"><i class="fa fa-download"></i> Unduh</a>';
                })
                ->addColumn('action',function($data){
                    $button = '<button data-toggle="tooltip" data-placement="top"  title="Ubah" class="btn btn-sm btn-warning" onclick="ubah(`'.$data->kd_arsip.'`)" ><i class="fa fa-edit"></i></button>';
                    $button .= '<button data-toggle="tooltip" data-placement="top"  title="Hapus" class="btn btn-sm btn-danger" onclick="hapus(`'.$data->kd_arsip.'`)" ><i class="fa fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action','unduh','tgl_upload','nama_tipe_arsip','keterangan'])
                ->make(true);
        }

        $keyword = $request->keyword;
        $tipe_arsip_all = TipeArsip::orderBy('ordering')->orderBy('nama_tipe_arsip')->get();

        return view('arsip.detail',compact('keyword','tipe_arsip_all'));
    }

    public function show($id, Request $request)
    {
        $tipe_arsip = TipeArsip::where('uri',$id)->first();
        if ($request->ajax()) {
            $data = Arsip::with('user')
                ->where('tahun',session('tahun'))
                ->where('kd_tipe_arsip',$tipe_arsip->kd_tipe_arsip)->latest();
            return DataTables::of($data)
                ->filter(function ($query) {

                    if (request()->has('nama_arsip')) {
                        if (request('nama_arsip') != "") {
                            $query->where('nama_arsip', 'like', "%" . request('nama_arsip') . "%");
                        }
                    }

                    if (request()->has('jenis')) {
                        if (request('jenis') != "") {
                            $query->where('jenis', request('jenis'));
                        }
                    }

                    if (request()->has('kd_user')) {
                        if (request('kd_user') != "") {
                            $query->where('kd_user', request('kd_user'));
                        }
                    }

                    if (request()->has('keterangan')) {
                        if (request('keterangan') != "") {
                            $query->where('keterangan', 'like', "%" . request('keterangan') . "%");
                        }
                    }

                    if (request()->has('dateStart') && request()->has('dateEnd')) {
                        if (request('dateStart') != "" && request('dateEnd') != "") {
                            $query->where('created_at', '>=', request('dateStart').' 00:00:00');
                            $query->where('created_at', '<=', request('dateEnd').' 23:59:59');
                        }
                    }
                })
                ->addIndexColumn()
                ->addColumn('tgl_upload',function($data){
                    return tanggal_indo($data->created_at->toDateString()).',<br/>'.$data->created_at->toTimeString();
                })
                ->addColumn('unduh',function($data){
                    return '<a data-toggle="tooltip" data-placement="top"  title="Unduh Berkas"  style="font-size: 12sp !important" href="'.route('arsip.unduh',$data->kd_arsip).'" class="btn btn-success text-white py-1"><i class="fa fa-download"></i> Unduh</a>';
                })
                ->addColumn('action',function($data){
                    $button = '<button data-toggle="tooltip" data-placement="top"  title="Ubah" class="btn btn-sm btn-warning" onclick="ubah(`'.$data->kd_arsip.'`)" ><i class="fa fa-edit"></i></button>';
                    $button .= '<button data-toggle="tooltip" data-placement="top"  title="Hapus" class="btn btn-sm btn-danger" onclick="hapus(`'.$data->kd_arsip.'`)" ><i class="fa fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action','unduh','tgl_upload'])
                ->make(true);
        }
        $tipe_arsip_all = TipeArsip::orderBy('ordering')->orderBy('nama_tipe_arsip')->get();
        $tipe_file = Arsip::where('kd_tipe_arsip',$tipe_arsip->kd_tipe_arsip)->groupBy('jenis')->get();

        return view('arsip.index',compact('tipe_arsip','tipe_file','tipe_arsip_all'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);
        return response()->json($arsip,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $arsip = Arsip::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data,[
            'nama_arsip' => 'required',
            'keterangan' => 'required',
            'kd_tipe_arsip' => 'required',
            'jenis' => 'required',
            'nama_file'=>'sometimes|nullable|mimes:jpeg,jpg,png,pdf,zip,rar,7z,doc,docx,xls,xlsx,ppt,pptx|max:25000'
        ]);

        if ($validasi->fails())
        {
            $error = '';

            foreach($validasi->errors()->all() as $row){
                $error .= '<li>'.$row.'</li>';
            }

            return response()->json([
                'status' => false,
                'message' => '<div class="alert alert-danger" role="alert">
                <div class="alert-message">
                    '.$error.'
                </div>
            </div>'
            ],200);
        }

        $tipe_arsip = TipeArsip::select('uri','nama_tipe_arsip')->findOrFail($data['kd_tipe_arsip']);
        if ($request->has('nama_file')) {
            if ($request->file('nama_file')->isValid())
            {
                Storage::disk('upload')->delete($arsip->nama_file);
                $file = $request->file('nama_file');
                $extention = $file->getClientOriginalExtension();

                $namaFile = 'arsip/'.$tipe_arsip->uri.'/'.$data['nama_arsip'].'-'.uniqid().'.'.$extention;

                $uploadPath = 'uploads/arsip/'.$tipe_arsip->uri;
                $file->move($uploadPath,$namaFile);
                $data['nama_file'] = $namaFile;
            }
        }else{
            $extention = pathinfo($arsip->nama_file, PATHINFO_EXTENSION);

            $namaFile = 'arsip/'.$tipe_arsip->uri.'/'.$data['nama_arsip'].'-'.uniqid().'.'.$extention;
            Storage::disk('upload')->move($arsip->nama_file,$namaFile);
            $data['nama_file'] = $namaFile;
        }

        $data['kd_user'] = Auth::user()->kd_user;
        $arsip->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Arsip '.$tipe_arsip->nama_tipe_arsip.' Berhasil Diperbarui!'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Arsip::findOrFail($id);
        $tipe_arsip = TipeArsip::findOrFail($data->kd_tipe_arsip);
        Storage::disk('upload')->delete($data->nama_file);
        $data->delete($data);

        return response()->json([
            'status' => true,
            'message' => 'Arsip '.$tipe_arsip->nama_tipe_arsip.' Berhasil Dihapus!'
        ],200);
    }
}
