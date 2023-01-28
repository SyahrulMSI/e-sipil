<?php

namespace App\Http\Controllers\Customer\Layanan;

use App\Http\Controllers\Controller;
use App\Models\TambahDaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\DetailUser;
use App\Models\User;

class TambahDayaListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'     =>      'Tambah Daya Listrik'
        );

        return view('pages.pelanggan.layanan.tambahdaya.index', $data);
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
        $request->validate([
            'nama_lengkap'  =>  'required',
            'ID_meter'  =>  'required|digits_between:12,15',
            'tarif_lama'  =>  'required',
            'tarif_baru'  =>  'required',
            'daya_lama'  =>  'required',
            'daya_baru'  =>  'required',
            'lokasi_meter' =>  'required|min:5|max:50'
        ]);

        $id_meter = $request->ID_meter;
        $tarif_l = $request->tarif_lama;
        $tarif_b = $request->tarif_baru;
        $daya_l = $request->daya_lama;
        $daya_b = $request->daya_baru;
        $lokasi = $request->lokasi_meter;

        $cek = DetailUser::where('id_user', Auth::user()->id)->first();

        if(empty($cek)){

            Alert::info('Informasi', 'Silahkan melengkapi biodata sebelum mengajukan permohonan !');
            return redirect()->route('customer.my_profile.index');

        } else {

            User::where('id', Auth::user()->id)->update([
                'nama_lengkap'  =>  $request->nama_lengkap
            ]);

            $data = array(
                'id_user'   =>  Auth::user()->id,
                'nomor_registrasi'  =>  date('Ymdis') . Auth::user()->id,
                'tanggal'   => date('Y-m-d'),
                'ID_meter'  =>  $id_meter,
                'tarif_lama'  => $tarif_l,
                'tarif_baru'  => $tarif_b,
                'daya_lama'  => $daya_l,
                'daya_baru'  => $daya_b,
                'lokasi_meter' =>  $lokasi,
                'status_permohonan' =>  1
            );

            $result = TambahDaya::create($data);

            if($result){
                Alert::success('Berhasils', 'Data permohonan berhasil di buat.');
                return redirect()->route('customer.tambah_daya_listrik.index');
            } else {
                Alert::error('Gagal', 'Data permohonan gagal di buat.');
                return redirect()->route('customer.tambah_daya_listrik.index');
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
