<?php

namespace App\Http\Controllers\Admin\Konfirmasi;

use App\Http\Controllers\Controller;
use App\Models\PemasanganBaru;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;
use GrahamCampbell\ResultType\Success;

class KonfirmasiPasangMeterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pb = PemasanganBaru::where('id', $id)->first();

        $user = User::where('id', $pb->id_user)->first();

        $data = array(
            'title' =>  'Konfirmasi Pasang Meter Baru',
            'pb'    => $pb,
            'u'     =>  $user
        );

        return view('pages.admin.konfirmasi.pasangmeter', $data);
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
    public function store(Request $request, $id)
    {
        $request->validate([
            'total_bayar'   =>  'required',
            'type_pembayaran'   =>  'required'
        ]);

        PemasanganBaru::where('id', $id)->update([
            'status_permohonan' =>  1
        ]);

        $pb = PemasanganBaru::where('id', $id)->first();

        $result = Transaksi::create([
            'id_user'   =>  $pb->id_user,
            'id_pemasangan_baru'    => $pb->id,
            'total_bayar'   =>  $request->total_bayar,
            'type_pembayaran'   =>  $request->type_pembayaran,
            'status'    =>  'WAITING',
            'tanggal_transaksi' =>  date('Y-m-d')
        ]);

        if($result){
            Alert::success('Success', 'Tagihan berhasil di buat');
            return redirect()->route('admin.list_permohonan.index');
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
