<?php

namespace App\Http\Controllers\Admin\User\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\USer;
use Illuminate\Support\Facades\Hash;
use Alert;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id', 'DESC')->where('role', 3)->get();

        $data = array(
            'title'     =>  'Data Customer',
            'users'     =>  $user
        );

        return view('pages.admin.users.customer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title'     =>  'Tambah Data Customer',
        );

        return view('pages.admin.users.customer.add', $data);
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
            'role'      =>  3
        );

        $result = User::create($data);

        if($result){
            Alert::success('Success', 'Data berhasil disimpan.');
            return redirect()->route('admin.customer.index');
        } else {
            Alert::error('Error', 'Data gagal disimpan.');
            return redirect()->route('admin.customer.create');
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
        $user = User::where('id', $id)->first();

        $data = array(
            'title'     =>  'Edit Data Customer',
            'user'      =>  $user
        );

        return view('pages.admin.users.customer.edit', $data);
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
                'role'      =>  3
            );

            $result = User::where('id', $id)->update($data);

            if($result){
                Alert::success('Success', 'Data berhasil diupdate.');
                return redirect()->route('admin.customer.index');
            } else {
                Alert::error('Error', 'Data gagal diupdate.');
                return redirect()->route('admin.customer.create');
            }

        } else {

            $data = array(
                'nama_lengkap'  =>  $nama,
                'email' =>  $email,
                'no_telp'   =>  $no,
                'password'  =>  Hash::make($password),
                'role'      =>  3
            );

            $result = User::where('id', $id)->update($data);

            if($result){
                Alert::success('Success', 'Data berhasil diupdate.');
                return redirect()->route('admin.customer.index');
            } else {
                Alert::error('Error', 'Data gagal diupdate.');
                return redirect()->route('admin.customer.edit', $id);
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
            return redirect()->route('admin.customer.index');
        } else {
            Alert::error('Error', 'Data gagal dihapus.');
            return redirect()->route('admin.customer.index');
        }
    }
}
