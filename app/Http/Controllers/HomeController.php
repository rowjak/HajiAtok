<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;
use App\Models\{Arsip,TipeArsip,User};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard(){
        $jumlah = [
            'tipe_arsip' => TipeArsip::select('kd_tipe_arsip')->count(),
            'arsip' => Arsip::select('kd_arsip')->where('tahun',session('tahun'))->count(),
            'pegawai' => User::select('kd_user')->count()
        ];
        return view('dashboard.index',compact('jumlah'));
    }

    public function chart(){
        $data = TipeArsip::select('kd_tipe_arsip','nama_tipe_arsip','ordering')
            ->orderBy('ordering')
            ->orderBy('nama_tipe_arsip')
            ->whereHas('arsip', function ($query) {
                $query->where('tahun', session('tahun'));
            })
            ->withCount('arsip')->get();
        $resp = [];
        foreach ($data as $row) {
            $resp[] = [
                'name' => $row->nama_tipe_arsip,
                'data' => [$row->arsip_count]
            ];
        }
        return response()->json($resp,200);
    }


    public function themeChange(Request $request){
        $data = $request->all();

        $validasi = Validator::make($data,[
            'theme' => 'in:dark,light'
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

        DB::table('users')->where('kd_user',Auth::user()->kd_user)->update([
            'theme' => $data['theme']
        ]);

        return response()->json([
            'status' => true,
            'theme' => $data['theme'],
            'message' => 'tema berhasil diubah.'
        ],200);
    }


}
