<?php

namespace App\Http\Controllers\Customer\Layanan;

use App\Http\Controllers\Controller;
use App\Models\JenisKerusakan;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\User;
use App\Models\DetailUser;


class ServiceMeterListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'     =>      'Service Meter Listrik'
        );

        return view('pages.pelanggan.layanan.servicemeter.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(403);
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
            'nama_lengkap'  =>  'required',
            'ID_meter'      =>  'required',
            'kerusakan'     =>  'required',
            'deskripsi'     =>  'required',
            'alamat'        =>  'required'
        ]);

        $id = Auth::user()->id;
        $jenis_service = 'meter_listrik';
        $id_meter   = $request->ID_meter;
        $alamat = $request->alamat;

        $kerusakan = $request->kerusakan;
        $deskripsi = $request->deskripsi;

        $cek = DetailUser::where('id_user', Auth::user()->id)->first();

        if(empty($cek)){

            Alert::info('Informasi', 'Silahkan melengkapi biodata sebelum mengajukan permohonan !');
            return redirect()->route('customer.my_profile.index');

        } else {

            User::where('id', Auth::user()->id)->update([
                'nama_lengkap'  =>  $request->nama_lengkap
            ]);


            //query add data to service table
            $service = new Service();
            $service->id_user = $id;
            $service->nomor_registrasi = date('Ymdis') . Auth::user()->id;
            $service->ID_meter  = $id_meter;
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

            Alert::success('Berhasil', 'Permohonan berhasil dibuat.');
            return redirect()->route('customer.service_meter_listrik.index');

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
