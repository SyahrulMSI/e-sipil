<?php

namespace App\Http\Controllers\Admin\Pemasangan;

use App\Http\Controllers\Controller;
use App\Models\InstalasiBangunan;
use App\Models\PemasanganBaru;
use App\Models\Service;
use Illuminate\Http\Request;

class AgendaPemasanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'     =>     'Data Agenda Pemasangan',
            'pmb'   =>  PemasanganBaru::orderBy('id', 'DESC')->get(),
            'sm'   =>  Service::where('jenis_service', 'meter_listrik')->orderBy('id', 'DESC')->get(),
            'slb'   =>  Service::where('jenis_service', 'listrik_bangunan')->orderBy('id', 'DESC')->get(),
            'ib'    =>  InstalasiBangunan::orderBy('id', 'DESC')->get(),
        );  

        return view('pages.admin.pemasangan.agenda.index', $data);
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
