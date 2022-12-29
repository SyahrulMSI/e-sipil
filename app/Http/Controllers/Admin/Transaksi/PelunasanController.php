<?php

namespace App\Http\Controllers\Admin\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tugas;
use Midtrans;
use App\Models\Transaksi;   
use Alert;
use App\Models\RincianPelunasan;

class PelunasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Midtrans\Config::$isSanitized = env('MIDTRANS_SANITIZED');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
    }

    public function index()
    {
        $data = array(
            'title'     =>  'Pelunasan Transaki Pelanggan'
        );

        return view('pages.admin.transaksi.pelunasan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if($request->id_instalasi != null){

            $data = array(
                'id_user'   => $request->us,
                'id_instalasi'  =>  $request->id_instalasi,
                'total_bayar'   =>  $request->nominal_tagihan,
                'type_pembayaran'   =>  'pelunasan',
                'status'    =>  'WAITING',
                'tanggal_transaksi' =>  date('Y-m-d')
            );

            $result = Transaksi::create($data);

            getSnapRedirect($result);

            if($result){

                $data = array(
                    'id_user'   =>  $request->us,
                    'id_transaksi'  =>  $result->id,
                    'rincian'       =>  $request->rincian,
                    'nominal_tagihan'   => $request->nominal,
                    'nominal_dp' =>  $request->dp,
                    'nominal_pelunasan' =>  $request->nominal_tagihan
                );  
    
                
                RincianPelunasan::create($data);

                Alert::success('Success', 'Tagihan berhasil di buat');
                return redirect()->route('admin.pelunasan.index');
            }  else {
                Alert::error('Error','Tagihan gagal di buat');
                return redirect()->route('admin.pelunasan.index');
            }
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
