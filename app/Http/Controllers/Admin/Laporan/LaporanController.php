<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' =>  'Laporan Transaksi'
        );

        return view('pages.admin.laporan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate(
            [
                'tgl_awal'  =>  'required',
                'tgl_akhir' =>  'required'
            ]
        );

        // $startDate = Carbon::createFromFormat('Y-m-d', '2021-06-01');
        // $endDate = Carbon::createFromFormat('Y-m-d', '2021-06-30');

        $data = array(
            'title' =>  'Laporan Transaksi',
            'tgl_awal' =>  $request->tgl_awal,
            'tgl_akhir' =>  $request->tgl_akhir,
            'transaksi' =>  Transaksi::whereBetween('tanggal_transaksi', [$request->tgl_awal, $request->tgl_akhir])->get()
        );

        return view('pages.admin.laporan.cetak', $data);


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
