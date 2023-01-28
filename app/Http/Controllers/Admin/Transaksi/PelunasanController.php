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
            'title'     =>  'Pelunasan Transaki Pelanggan',
            'transaksi' =>  Transaksi::where('type_pembayaran','pelunasan')->orderBy('id', 'DESC')->get()
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


        if(isset($request->id_instalasi)){

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

                Alert::success('Berhasil', 'Tagihan berhasil di buat');
                return redirect()->route('admin.pelunasan.index');
            }  else {
                Alert::error('Gagal','Tagihan gagal di buat');
                return redirect()->route('admin.pelunasan.index');
            }
        }else if(isset($request->id_service)){

            $tot_bayar = $request->nominal_tagihan - $request->dp;

            $data = array(
                'id_user'   => $request->us,
                'id_service'  =>  $request->id_service,
                'total_bayar'   =>  $tot_bayar,
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
                    'nominal_tagihan'   => $request->nominal_tagihan,
                    'nominal_dp' =>  $request->dp,
                    'nominal_pelunasan' =>  $tot_bayar
                );


                RincianPelunasan::create($data);

                Alert::success('Berhasil', 'Tagihan berhasil di buat');
                return redirect()->route('admin.pelunasan.index');
            }  else {
                Alert::error('Gagal','Tagihan gagal di buat');
                return redirect()->route('admin.pelunasan.index');
            }
        } else if(isset($request->id_tambah_daya)){

            $tot_bayar = $request->nominal_tagihan - $request->dp;

            $data = array(
                'id_user'   => $request->us,
                'id_tambah_daya'  =>  $request->id_tambah_daya,
                'total_bayar'   =>  $tot_bayar,
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
                    'nominal_tagihan'   => $request->nominal_tagihan,
                    'nominal_dp' =>  $request->dp,
                    'nominal_pelunasan' =>  $tot_bayar
                );


                RincianPelunasan::create($data);

                Alert::success('Berhasil', 'Tagihan berhasil di buat');
                return redirect()->route('admin.pelunasan.index');
            }  else {
                Alert::error('Gagal','Tagihan gagal di buat');
                return redirect()->route('admin.pelunasan.index');
            }
        }else if(isset($request->id_pemasangan_baru)){

            $tot_bayar = $request->nominal_tagihan - $request->dp;

            $data = array(
                'id_user'   => $request->us,
                'id_pemasangan_baru'  =>  $request->id_pemasangan_baru,
                'total_bayar'   =>  $tot_bayar,
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
                    'nominal_tagihan'   => $request->nominal_tagihan,
                    'nominal_dp' =>  $request->dp,
                    'nominal_pelunasan' =>  $tot_bayar
                );


                RincianPelunasan::create($data);

                Alert::success('Berhasil', 'Tagihan berhasil di buat');
                return redirect()->route('admin.pelunasan.index');
            }  else {
                Alert::error('Gagal','Tagihan gagal di buat');
                return redirect()->route('admin.pelunasan.index');
            }
        } else {
            Alert::error('Gagal','Something Wrong !');
            return redirect()->route('admin.data_tugas.index');
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
        $result = Transaksi::destroy($id);

        if($result){
            Alert::success('Berhasil', 'Data berhasil di hapus');
            return redirect()->route('admin.pelunasan.index');
        } else {
            Alert::error('Gagal', 'Data gagal di hapus');
            return redirect()->route('admin.pelunasan.index');
        }
    }
}
