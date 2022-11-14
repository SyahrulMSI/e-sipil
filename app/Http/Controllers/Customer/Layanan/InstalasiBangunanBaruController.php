<?php

namespace App\Http\Controllers\Customer\Layanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Models\InstalasiBangunan;
use Illuminate\Support\Facades\Auth;


class InstalasiBangunanBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'     =>      'Instalasi Bangunan Baru'
        );

        return view('pages.pelanggan.layanan.instalasibangunan.index', $data);
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
            'jenis_instalasi'   => 'required',
            'alamat'    =>  'required'
        ]);

        $jenis = $request->jenis_instalasi;
        $alamat = $request->alamat;
        $harga = $request->penetapan_harga_per_titik;

        $data = array(
            'id_user'   =>  Auth::user()->id,
            'nomor_registrasi'  =>  date('Ymdis') . Auth::user()->id,
            'tanggal'   => date('Y-m-d'),
            'alamat'    =>  $alamat,
            'jenis_instalasi'   => $jenis,
            'penetapan_harga_per_titik'  =>  $harga,
            'status_permohonan' => 1,
        );

        $result = InstalasiBangunan::create($data);

        if($result){
            Alert::success('Success', 'Data permohonan berhasil di buat.');
            return redirect()->route('customer.instalasi_bangunan_baru.index');
        } else {
            Alert::error('Error', 'Data permohonan gagal di buat.');
            return redirect()->route('customer.instalasi_bangunan_baru.index');
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
        //
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
