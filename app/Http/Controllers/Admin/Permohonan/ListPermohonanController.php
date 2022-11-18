<?php

namespace App\Http\Controllers\Admin\Permohonan;

use App\Http\Controllers\Controller;
use App\Models\InstalasiBangunan;
use App\Models\PemasanganBaru;
use App\Models\TambahDaya;
use Illuminate\Http\Request;

class ListPermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pasang_baru =  PemasanganBaru::orderBy('id', 'DESC')->get();
        $tambah_daya = TambahDaya::orderBy('id', 'DESC')->get();
        $instalasi_bangunan = InstalasiBangunan::orderBy('id', 'DESC')->get();


        $data = array(
            'title'     =>  'List Data Permohonan',
            'pasang_baru'   =>  $pasang_baru,
            'tambah_daya'   =>  $tambah_daya,
            'instalasi_bangunan'    =>  $instalasi_bangunan
        );

        return view('pages.admin.permohonan.list.index', $data);
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
