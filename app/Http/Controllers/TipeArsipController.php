<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeArsip;
use Illuminate\Validation\Rule;
use Validator;
use DataTables;

class TipeArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = TipeArsip::select('kd_tipe_arsip','nama_tipe_arsip','uri')->orderBy('nama_tipe_arsip');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($data){
                    $button = '<button data-toggle="tooltip" data-placement="top"  title="Ubah" class="btn btn-sm btn-warning" onclick="ubah(`'.$data->kd_tipe_arsip.'`)" ><i class="fa fa-edit"></i></button>';
                    $button .= '<button data-toggle="tooltip" data-placement="top"  title="Hapus" class="btn btn-sm btn-danger" onclick="hapus(`'.$data->kd_tipe_arsip.'`)" ><i class="fa fa-trash"></i></button>';
                    return $button;
                })
                ->editColumn('uri',function($data){
                    return '<a target="_blank" href="'.route('arsip.show',$data->uri).'">'.$data->uri.'</a>';
                })
                ->rawColumns(['action','uri'])
                ->make(true);
        }
        return view('tipe_arsip.index');

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
            'nama_tipe_arsip' => 'required|unique:tipe_arsip',
            'uri' => 'required|unique:tipe_arsip'
        ]);

        if ($validasi->fails())
        {
            $error = '';

            foreach($validasi->errors()->all() as $row){
                $error .= '<li>'.$row.'</li>';
            }

            return response()->json([
                'status' => false,
                'message' => '<div class="alert alert-danger" role="alert"><div class="alert-message">'.$error.'</div></div>'
            ],200);
        }

        TipeArsip::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Data Tipe Arsip Berhasil Ditambahkan!'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipe_arsip = TipeArsip::findOrFail($id);
        return response()->json($tipe_arsip,200);
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
        $tipe_arsip = TipeArsip::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data,[
            'nama_tipe_arsip' => [
                'required',
                Rule::unique('tipe_arsip')->ignore($tipe_arsip),
            ],
            'uri' => [
                'required',
                Rule::unique('tipe_arsip')->ignore($tipe_arsip),
            ]
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

        $tipe_arsip->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Data Tipe Arsip Berhasil Diperbarui!'
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
        $data = TipeArsip::findOrFail($id);
        $data->delete($data);
        return response()->json([
            'status' => true,
            'message' => 'Data Tipe Arsip Berhasil Dihapus!'
        ],200);
    }
}
