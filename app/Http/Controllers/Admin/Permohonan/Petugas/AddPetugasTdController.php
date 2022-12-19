<?php

namespace App\Http\Controllers\Admin\Permohonan\Petugas;

use App\Http\Controllers\Controller;
use App\Models\TambahDaya;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;

class AddPetugasTdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $td = TambahDaya::where('id', $id)->first();

        $data = array(
            'title' => 'Tambah Petugas Tambah Daya: ' . $td->nomor_registrasi,
            'td'   =>  $td,
            'petugas'   =>  User::where('role', 2)->orderBy('id', 'DESC')->get(),
            'tugas' =>  Tugas::where('id_tambah_daya', $id)->get()
            //status 1 == selesai
        );

        return view('pages.admin.permohonan.add_petugas.td', $data);
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

        $pmb = TambahDaya::where('id', $id)->first();

        $data = array(
            'id_pelanggan'  => $pmb->id_user,
            'id_petugas'    =>  $request->id_petugas,
            'id_tambah_daya'    =>  $id,
            'status'    =>  0
        );

        $result = Tugas::create($data);

        if($result){
            Alert::success('Success', 'Data berhasil di simpan');
            return redirect()->route('admin.list_permohonan.add_petugas_td.index', $id);
        } else {
            Alert::error('Error', 'Data gagal di simpan');
            return redirect()->route('admin.list_permohonan.add_petugas_td.index', $id);
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
        $td = Tugas::where('id', $id)->first();


        $result = Tugas::destroy($id);

        if($result){
            Alert::success('Success', 'Data berhasil di hapus');
            return redirect()->route('admin.list_permohonan.add_petugas_td.index', $td->id_tambah_daya);
        } else {
            Alert::error('Error', 'Data gagal di hapus');
            return redirect()->route('admin.list_permohonan.add_petugas_td.index', $td->id_tambah_daya);
        }
    }
}
