<?php

namespace App\Http\Controllers\Customer\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Models\DetailUser;
use Illuminate\Support\Facades\Auth;

class DetailProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $request->validate([
            'profile'   =>  'nullable|mimetypes:png,jpg,jpeg,svg',
            'npwp'      =>  'nullable|max:12',
            'jenis_kelamin' => 'nullable',
            'kelurahan' =>  'required',
            'kecamatan' =>  'required',
            'kabupaten' =>  'required',
            'provinsi'  =>  'required',
            'jenis_identitas'   =>  'required',
            'no_identitas'  => 'required|max:20'
        ]);

        $profile = $request->file('profile');
        $npwp = $request->npwp;
        $jk = $request->jenis_kelamin;
        $kelurahan = $request->kelurahan;
        $kecamatan = $request->kecamatan;
        $kabupaten = $request->kabupaten;
        $provinsi = $request->provinsi;
        $ji = $request->jenis_identitas;
        $ni  = $request->no_identitas;

        if($request->has('profile'))
        {

            $path = $profile->store('public/profiles');

            $data = array(
                'id_user'   =>  Auth::user()->id,
                'profile'   =>  $path,
                'npwp'  =>  $npwp,
                'jenis_kelamin' => $jk,
                'kelurahan' =>  $kelurahan,
                'kecamatan' =>  $kecamatan,
                'kabupaten' =>  $kabupaten,
                'provinsi'  =>  $provinsi,
                'jenis_identitas'   =>  $ji,
                'no_identitas'  =>  $ni
            );


            $result = DetailUser::create($data);

            if($result){
                Alert::success('Success', 'Profile berhasil di simpan');
                return redirect()->route('customer.my_profile.index');
            } else {
                Alert::error('Error', 'Profile gagal di simpan');
                return redirect()->route('customer.my_profile.index');
            }

        } else {
            $data = array(
                'id_user'   =>  Auth::user()->id,
                'npwp'  =>  $npwp,
                'jenis_kelamin' => $jk,
                'kelurahan' =>  $kelurahan,
                'kecamatan' =>  $kecamatan,
                'kabupaten' =>  $kabupaten,
                'provinsi'  =>  $provinsi,
                'jenis_identitas'   =>  $ji,
                'no_identitas'  =>  $ni
            );


            $result = DetailUser::create($data);

            if($result){
                Alert::success('Success', 'Profile berhasil di simpan');
                return redirect()->route('customer.my_profile.index');
            } else {
                Alert::error('Error', 'Profile gagal di simpan');
                return redirect()->route('customer.my_profile.index');
            }
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
            'profile'   =>  'nullable|mimes:jpg,jpeg,png,svg|max:2048',
            'npwp'      =>  'nullable|max:16',
            'jenis_kelamin' =>  'nullable',
            'kelurahan' =>  'required',
            'kecamatan' =>  'required',
            'kabupaten' =>  'required',
            'provinsi'  =>  'required',
            'jenis_identitas'   =>  'required',
            'no_identitas'  => 'required|max:20'
        ]);

        $profile = $request->file('profile');
        $npwp = $request->npwp;
        $jk = $request->jenis_kelamin;
        $kelurahan = $request->kelurahan;
        $kecamatan = $request->kecamatan;
        $kabupaten = $request->kabupaten;
        $provinsi = $request->provinsi;
        $ji = $request->jenis_identitas;
        $ni  = $request->no_identitas;

        if($request->has('profile'))
        {

            $path = $profile->store('public/profiles');

            $data = array(
                'id_user'   =>  Auth::user()->id,
                'profile'   =>  $path,
                'npwp'  =>  $npwp,
                'jenis_kelamin' => $jk,
                'kelurahan' =>  $kelurahan,
                'kecamatan' =>  $kecamatan,
                'kabupaten' =>  $kabupaten,
                'provinsi'  =>  $provinsi,
                'jenis_identitas'   =>  $ji,
                'no_identitas'  =>  $ni
            );

            $result = DetailUser::where('id', $id)->update($data);

            if($result){
                Alert::success('Success', 'Profile berhasil di update');
                return redirect()->route('customer.my_profile.index');
            } else {
                Alert::error('Error', 'Profile gagal di update');
                return redirect()->route('customer.my_profile.index');
            }

        } else {
            $data = array(
                'id_user'   =>  Auth::user()->id,
                'npwp'  =>  $npwp,
                'jenis_kelamin' => $jk,
                'kelurahan' =>  $kelurahan,
                'kecamatan' =>  $kecamatan,
                'kabupaten' =>  $kabupaten,
                'provinsi'  =>  $provinsi,
                'jenis_identitas'   =>  $ji,
                'no_identitas'  =>  $ni
            );

            $result = DetailUser::where('id', $id)->update($data);

            if($result){
                Alert::success('Success', 'Profile berhasil di update');
                return redirect()->route('customer.my_profile.index');
            } else {
                Alert::error('Error', 'Profile gagal di update');
                return redirect()->route('customer.my_profile.index');
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
        //
    }
}
