<?php

namespace App\Http\Controllers\Customer\Permohonan;

use App\Http\Controllers\Controller;
use App\Models\InstalasiBangunan;
use Illuminate\Http\Request;
use App\Models\PemasanganBaru;
use Illuminate\Support\Facades\Auth;
use App\Models\TambahDaya;
use App\Models\Service;
use Alert;
use App\Models\JenisKerusakan;

class DaftarPermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pasang_meter = PemasanganBaru::where('id_user', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $tambah_daya = TambahDaya::where('id_user', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $instalasi = InstalasiBangunan::where('id_user', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $service = Service::where('id_user', Auth::user()->id)->orderBy('id', 'desc')->get();


        $data = array(
            'title'     =>  'Daftar Permohonan Layanan',
            'pemasangan_baru'   =>  $pasang_meter,
            'tambah_daya'   =>  $tambah_daya,
            'instalasi_bangunan'    =>     $instalasi,
            'service' =>  $service,
        );

        return view('pages.pelanggan.permohonan.index', $data);
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
        //
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
    public function destroy(Request $request, $id)
    {
        if($request->type == 'pmb'){
            $result = PemasanganBaru::destroy($id);

            if($result){
                Alert::success('Success', 'Data berhasil di hapus');
                return redirect()->route('customer.daftar_permohonan.index');
            } else {
                Alert::error('Error', 'Data gagal di hapus');
                return redirect()->route('customer.daftar_permohonan.index');
            }
        } else if($request->type == 'td'){
            $result = TambahDaya::destroy($id);
            if($result){
                Alert::success('Success', 'Data berhasil di hapus');
                return redirect()->route('customer.daftar_permohonan.index');
            } else {
                Alert::error('Error', 'Data gagal di hapus');
                return redirect()->route('customer.daftar_permohonan.index');
            }
        } else if($request->type == 'ib'){
            $result = InstalasiBangunan::destroy($id);

            if($result){
                Alert::success('Success', 'Data berhasil di hapus');
                return redirect()->route('customer.daftar_permohonan.index');
            } else {
                Alert::error('Error', 'Data gagal di hapus');
                return redirect()->route('customer.daftar_permohonan.index');
            }
        } else if($request->type == 'sm'){
            $result = Service::destroy($id);

            if($result){

                JenisKerusakan::where('id_service', $id)->delete();

                Alert::success('Success', 'Data berhasil di hapus');
                return redirect()->route('customer.daftar_permohonan.index');
            } else {
                Alert::error('Error', 'Data gagal di hapus');
                return redirect()->route('customer.daftar_permohonan.index');
            }
        }
    }
}
