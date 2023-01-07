<?php

namespace App\Http\Controllers\Customer\Pemasangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PemasanganBaru;
use App\Models\Service;
use App\Models\InstalasiBangunan;
use Auth;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'     =>      'Agenda Pemasangan',
            'pmb'   =>  PemasanganBaru::where('id_user', Auth::user()->id)->orderBy('id', 'DESC')->get(),
            'sm'   =>  Service::where('id_user', Auth::user()->id)->where('jenis_service', 'meter_listrik')->orderBy('id', 'DESC')->get(),
            'slb'   =>  Service::where('id_user', Auth::user()->id)->where('jenis_service', 'listrik_bangunan')->orderBy('id', 'DESC')->get(),
            'ib'    =>  InstalasiBangunan::where('id_user', Auth::user()->id)->orderBy('id', 'DESC')->get(),
        );

        return view('pages.pelanggan.pemasangan.agenda.index', $data);
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
