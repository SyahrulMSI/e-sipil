<?php

namespace App\Http\Controllers\Admin\Permohonan\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PemasanganBaru;
use App\Models\User;

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
            'petugas'   =>  User::where('role', 2)->whereDoesntHave('PemasanganBaru')->get()
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
    public function destroy($id)
    {
        //
    }
}
