<?php

namespace App\Http\Controllers\Customer\Layanan;

use App\Http\Controllers\Controller;
use App\Models\PemasanganBaru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class PasangMeterBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = array(
            'title'     =>      'Pasang Meter Baru'
        );

        return view('pages.pelanggan.layanan.pasangmeter.index', $data);
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
            'jenis_pemasangan'  => 'required',
            'daya'  =>  'required',
            'lokasi_pemasangan' =>  'required|min:5|max:50'
        ]);


        $jenis = $request->jenis_pemasangan;
        $daya = $request->daya;
        $lokasi = $request->lokasi_pemasangan;

        $data = array(
            'id_user'   =>  Auth::user()->id,
            'nomor_registrasi'  =>  date('Ymdis') . Auth::user()->id,
            'tanggal'   => date('Y-m-d'),
            'jenis_pemasangan'  =>  $jenis,
            'daya'  => $daya,
            'lokasi_pemasangan' =>  $lokasi,
            'status_permohonan' =>  1
        );

        $result = PemasanganBaru::create($data);

        if($result){
            Alert::success('Success', 'Data permohonan berhasil di buat.');
            return redirect()->route('customer.pasang_meter_baru.index');
        } else {
            Alert::error('Error', 'Data permohonan gagal di buat.');
            return redirect()->route('customer.pasang_meter_baru.index');
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
