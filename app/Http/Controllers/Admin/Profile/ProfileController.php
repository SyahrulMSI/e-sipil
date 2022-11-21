<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\DetailUser;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' =>  'My Profile'
        );

        return view('pages.admin.profile.index', $data);
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
        //
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
            'nama_lengkap'  =>  'required|min:2|max:50',
            'email' =>  ['required', 'unique:users,email,' . Auth::user()->id],
            'no_telp'   =>  'required|min:11|max:14',
            'password'  =>  'nullable|min:8'
        ]);

        $nama = $request->nama_lengkap;
        $email = $request->email;
        $no = $request->no_telp;
        $password = $request->password;

        if($request->password == null){
            $data = array(
                'nama_lengkap'  =>  $nama,
                'email' =>  $email,
                'no_telp' =>    $no,
            );

            $result = User::where('id', $id)->update($data);

            if($result){
                Alert::success('Success', 'Profile berhasil di update');
                return redirect()->route('admin.my_profile.index');
            } else {
                Alert::error('Error', 'Profile gagal di update');
                return redirect()->route('admin.my_profile.index');
            }

        } else {
            $data = array(
                'nama_lengkap'  =>  $nama,
                'email' =>  $email,
                'no_telp' =>    $no,
                'password'  => Hash::make($password)
            );

            $result = User::where('id', $id)->update($data);

            if($result){
                Alert::success('Success', 'Profile berhasil di update');
                return redirect()->route('admin.my_profile.index');
            } else {
                Alert::error('Error', 'Profile gagal di update');
                return redirect()->route('admin.my_profile.index');
            }

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

    }
}
