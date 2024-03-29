<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\InstalasiBangunan;
use App\Models\PemasanganBaru;
use App\Models\Service;
use App\Models\TambahDaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'     =>      'Dashboard',
            'pm'    =>  PemasanganBaru::where('id_user', Auth::user()->id)->count(),
            'ib'    =>  InstalasiBangunan::where('id_user', Auth::user()->id)->count(),
            'td'    =>  TambahDaya::where('id_user', Auth::user()->id)->count(),
            'sm'    =>  Service::where('id_user', Auth::user()->id)->where('jenis_service', 'meter_listrik')->count(),
            'sl'    =>  Service::where('id_user', Auth::user()->id)->where('jenis_service', 'listrik_bangunan')->count(),
        );

        return view('pages.pelanggan.dashboard', $data);
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
