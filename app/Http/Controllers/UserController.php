<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Validator;
use Illuminate\Validation\Rule;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($data){
                    $button = '<button data-toggle="tooltip" data-placement="top"  title="Ubah" class="btn btn-sm btn-warning" onclick="ubah(`'.$data->kd_user.'`)" ><i class="fa fa-edit"></i></button>';
                    $button .= '<button data-toggle="tooltip" data-placement="top"  title="Hapus" class="btn btn-sm btn-danger" onclick="hapus(`'.$data->kd_user.'`)" ><i class="fa fa-trash"></i></button>';
                        return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('user.index');
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
            'username' => 'required|unique:users',
            'nama_pegawai' => 'required',
            'role' => 'required|in:ketua,panitera,pegawai,admin',
            'password' => 'required',
            'theme' => 'required|in:light,dark'
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

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Data User Berhasil Ditambahkan!'
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
        $user = User::findOrFail($id);
        return response()->json($user,200);
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
        $user = User::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data,[
            'username' => [
                'required',
                Rule::unique('users')->ignore($user),
            ],
            'nama_pegawai' => 'required',
            'role' => 'required|in:ketua,panitera,pegawai,admin',
            'password' => 'sometimes|nullable',
            'theme' => 'required|in:light,dark'
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

        if ($data['password'] != '') {
            $data['password'] = bcrypt($data['password']);
        }else{
            unset($data['password']);
        }

        $user->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Data Berhasil Diperbarui!'
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
        $data = User::findOrFail($id);
        $data->delete($data);
        return response()->json([
            'status' => true,
            'message' => 'Data Berhasil Dihapus!'
        ],200);
    }
}
