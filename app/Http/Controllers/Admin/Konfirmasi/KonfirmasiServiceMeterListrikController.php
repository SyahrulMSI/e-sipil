<?php

namespace App\Http\Controllers\Admin\Konfirmasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Alert;
use App\Models\User;
use App\Models\Service;

class KonfirmasiServiceMeterListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $sml = Service::where('id', $id)->where('jenis_service', 'meter_listrik')->first();

        $user = User::where('id', $sml->id_user)->first();

        $data = array(
            'title' =>  'Konfirmasi Service Meter Listrik',
            'sml'    => $sml,
            'u'     =>  $user
        );

        return view('pages.admin.konfirmasi.sml', $data);
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
        }  else {
            Alert::error('Error','Tagihan gagal di buat');
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
