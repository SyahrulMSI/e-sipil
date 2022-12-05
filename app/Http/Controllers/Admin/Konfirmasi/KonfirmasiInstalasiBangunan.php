<?php

namespace App\Http\Controllers\Admin\Konfirmasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Alert;
use App\Models\InstalasiBangunan;
use App\Models\User;

class KonfirmasiInstalasiBangunan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $ib = InstalasiBangunan::where('id', $id)->first();

        $user = User::where('id', $ib->id_user)->first();

        $data = array(
            'title' =>  'Konfirmasi Instalasi Bangunan',
            'ib'    =>  $ib,
            'u'     =>  $user
        );

        return view('pages.admin.konfirmasi.instalasibangunan', $data);
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
            'jumlah_titik'  =>  'required',
            'total_bayar'   =>  'required',
            'type_pembayaran'   =>  'required'
        ]);

        InstalasiBangunan::where('id', $id)->update([
            'jumlah_titik'   =>  $request->jumlah_titik,
            'status_permohonan' =>  2
        ]);

        $ib = InstalasiBangunan::where('id', $id)->first();

        $result = Transaksi::create([
            'id_user'   =>  $ib->id_user,
            'id_instalasi'    => $ib->id,
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
