<?php

namespace App\Http\Controllers\Admin\User\Petugas;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Alert;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->where('role', 2)->get();

        $data = array(
            'title'     =>  'Data Petugas',
            'users'     =>  $users
        );

        return view('pages.admin.users.petugas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title'     =>  'Tambah Data Petugas',
        );

        return view('pages.admin.users.petugas.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'  =>  'required|min:3|max:100',
            'email'         =>  'required|unique:users,email',
            'no_telp'       =>  'nullable|min:11|max:13',
            'password'      =>  'required|min:8'
        ]);

        $nama = $request->nama_lengkap;
        $email  =   $request->email;
        $no =   $request->no_telp;
        $password = $request->password;

        $data = array(
            'nama_lengkap'  =>  $nama,
            'email' =>  $email,
            'no_telp'   =>  $no,
            'password'  =>  Hash::make($password),
            'role'      =>  2
        );

        $result = User::create($data);

        if($result){
            Alert::success('Success', 'Data berhasil disimpan.');
            return redirect()->route('admin.petugas.index');
        } else {
            Alert::error('Error', 'Data gagal disimpan.');
            return redirect()->route('admin.petugas.create');
        }
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
        $users = User::findOrFail($id);

        $data = array(
            'title'     =>  'Data Petugas',
            'user'     =>  $users
        );

        return view('pages.admin.users.petugas.edit', $data);
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
        $request->validate([
            'nama_lengkap'  =>  'required|min:3|max:100',
            'email'         =>  'required|unique:users,email,' . $id,
            'no_telp'       =>  'nullable|min:11|max:13',
            'password'      =>  'nullable|min:8'
        ]);

        $nama = $request->nama_lengkap;
        $email  =   $request->email;
        $no =   $request->no_telp;
        $password = $request->password;

        if($request->password == null){

            $data = array(
                'nama_lengkap'  =>  $nama,
                'email' =>  $email,
                'no_telp'   =>  $no,
                'role'      =>  2
            );

            $result = User::where('id', $id)->update($data);

            if($result){
                Alert::success('Success', 'Data berhasil diupdate.');
                return redirect()->route('admin.petugas.index');
            } else {
                Alert::error('Error', 'Data gagal diupdate.');
                return redirect()->route('admin.petugas.create');
            }

        } else {

            $data = array(
                'nama_lengkap'  =>  $nama,
                'email' =>  $email,
                'no_telp'   =>  $no,
                'password'  =>  Hash::make($password),
                'role'      =>  2
            );

            $result = User::where('id', $id)->update($data);

            if($result){
                Alert::success('Success', 'Data berhasil diupdate.');
                return redirect()->route('admin.petugas.index');
            } else {
                Alert::error('Error', 'Data gagal diupdate.');
                return redirect()->route('admin.petugas.edit', $id);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = User::destroy($id);

        if($result){
            Alert::success('Success', 'Data berhasil dihapus.');
            return redirect()->route('admin.petugas.index');
        } else {
            Alert::error('Error', 'Data gagal dihapus.');
            return redirect()->route('admin.petugas.index');
        }
    }
}
