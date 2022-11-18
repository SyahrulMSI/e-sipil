<?php

namespace App\Http\Controllers\Customer\Layanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\JenisKerusakan;
USE Alert;

class ServiceListrikBangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'     =>      'Service Listrik Bangunan'
        );

        return view('pages.pelanggan.layanan.servicelistrik.index', $data);
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
            'kerusakan' =>  'required',
            'deskripsi' =>  'required',
            'alamat'    =>  'required'
        ]);

        $id = Auth::user()->id;
        $jenis_service = 'listrik_bangunan';
        $alamat = $request->alamat;

        $kerusakan = $request->kerusakan;
        $deskripsi = $request->deskripsi;


        //query add data to service table
        $service = new Service();
        $service->id_user = $id;
        $service->nomor_registrasi = date('Ymdis') . Auth::user()->id;
        $service->tanggal = date('Y-m-d');
        $service->alamat = $alamat;
        $service->jenis_service = $jenis_service;
        $service->status_permohonan = 1;
        $service->save();

        //get service id current create
        $id_service = $service->id;

        //add to table jenis kerusakan
        $jenis_kerusakan = new JenisKerusakan();
        $jenis_kerusakan->id_service = $id_service;
        $jenis_kerusakan->kerusakan = $kerusakan;
        $jenis_kerusakan->deskripsi = $deskripsi;
        $jenis_kerusakan->save();

        Alert::success('Success', 'Permohonan berhasil dibuat.');
        return redirect()->route('customer.service_listrik_bangunan.index');
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
