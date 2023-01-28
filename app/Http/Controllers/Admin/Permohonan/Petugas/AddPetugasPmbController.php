<?php

namespace App\Http\Controllers\Admin\Permohonan\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PemasanganBaru;
use App\Models\User;
use App\Models\Tugas;
use Alert;

class AddPetugasPmbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $pmb = PemasanganBaru::where('id', $id)->first();

        $data = array(
            'title' => 'Tambah Petugas Pemasangan Meter Baru: ' . $pmb->nomor_registrasi,
            'pmb'   =>  $pmb,
            'petugas'   =>  User::where('role', 2)->orderBy('id', 'DESC')->get(),
            'tugas' =>  Tugas::where('id_pemasangan_baru', $id)->get()
            //status 1 == selesai
        );

        return view('pages.admin.permohonan.add_petugas.pmb', $data);
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
            'id_petugas'    =>  'required'
        ]);

        $pmb = PemasanganBaru::where('id', $id)->first();

        $data = array(
            'id_pelanggan'      =>      $pmb->id_user,
            'id_petugas'        =>  $request->id_petugas,
            'id_pemasangan_baru'    =>  $id,
            'status'            =>  '0'
        );

        $tran = $pmb->Transaksi()->first();

        if($tran->type_pembayaran == 'dp'){
            if($tran->status == 'WAITING'){
                Alert::info('Informasi', 'Anda tidak dapat menambahkan petugas sebelum Pelanggan melunasi Uang Muka terlebih dahulu !');
                return redirect()->back();
            }
        }

        $result = Tugas::create($data);

        if($result){
            Alert::success('Success', 'Data berhasil di simpan');
            return redirect()->route('admin.list_permohonan.add_petugas_pmb.index', $id);
        } else {
            Alert::error('Error', 'Data gagal di simpan');
            return redirect()->route('admin.list_permohonan.add_petugas_pmb.index', $id);
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
        $pmb = Tugas::where('id', $id)->first();


        $result = Tugas::destroy($id);

        if($result){
            Alert::success('Success', 'Data berhasil di hapus');
            return redirect()->route('admin.list_permohonan.add_petugas_pmb.index', $pmb->id_pemasangan_baru);
        } else {
            Alert::error('Error', 'Data gagal di hapus');
            return redirect()->route('admin.list_permohonan.add_petugas_pmb.index', $pmb->id_pemasangan_baru);
        }
    }
}
