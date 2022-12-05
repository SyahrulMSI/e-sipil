<?php

namespace App\Http\Controllers\Admin\Permohonan;

use App\Http\Controllers\Controller;
use App\Models\InstalasiBangunan;
use App\Models\PemasanganBaru;
use Illuminate\Http\Request;
use Alert;
use App\Models\TambahDaya;

class EditController extends Controller
{
    public function instalasiBangunan(Request $request, $id)
    {
        $data = array(
            'title' =>  'Edit Instalasi Bangunan',
            'ib'    =>  InstalasiBangunan::findOrFail($id)
        );

        return view('pages.admin.permohonan.edit.instalasibangunan', $data);
    }

    public function instalasiBangunanUpdate(Request $request, $id)
    {
        $request->validate([
            'jenis_instalasi'   =>  'required',
            'penetapan_harga_per_titik' => 'required',
            'alamat'    =>  'required'
        ]);

        $result = InstalasiBangunan::where('id', $id)->update([
            'jenis_instalasi'   =>  $request->jenis_instalasi,
            'penetapan_harga_per_titik' =>  $request->penetapan_harga_per_titik,
            'alamat'    =>  $request->alamat
        ]);

        if($result){
            Alert::success('Success', 'Data Instalasi Bangunan berhasil di update');
            return redirect()->route('admin.list_permohonan.index');
        } else {
            Alert::error('Error', 'Data gaagal di update');
            return redirect()->route('admin.instalasi.bangunan', $id);
        }
    }

    public function pasangMeter(Request $request, $id)
    {
        $data = array(
            'title' =>  'Edit Pasang Meter Baru',
            'pm'    =>  PemasanganBaru::findOrFail($id)
        );

        return view('pages.admin.permohonan.edit.pasangmeter', $data);

    }

    public function pasangMeterUpdate(Request $request, $id)
    {
        $request->validate([
            'jenis_pemasangan'  => 'required',
            'daya'  =>  'required',
            'lokasi_pemasangan' =>  'required|min:5|max:50'
        ]);

        $result = PemasanganBaru::where('id', $id)->update([
            'jenis_pemasangan'  =>  $request->jenis_pemasangan,
            'daya'  => $request->daya,
            'lokasi_pemasangan' =>  $request->lokasi_pemasangan
        ]);

        if($result){
            Alert::success('Success', 'Data Pemasangan Meter Baru berhasil di update.');
            return redirect()->route('admin.list_permohonan.index');
        } else {
            Alert::error('Error', 'Data gagal di update.');
            return redirect()->route('admin.pasang.meter', $id);
        }
    }

    public function tambahDaya(Request $request, $id)
    {

        $data = array(
            'title' =>  'Edit Tambah Daya',
            'td'    =>  TambahDaya::findOrFail($id)
        );

        return view('pages.admin.permohonan.edit.tambahdaya', $data);

    }

    public function tambahDayaUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap'  =>  'required',
            'tarif_lama'  =>  'required',
            'tarif_baru'  =>  'required',
            'daya_lama'  =>  'required',
            'daya_baru'  =>  'required',
            'lokasi_meter' =>  'required|min:5|max:50'
        ]);


        $tarif_l = $request->tarif_lama;
        $tarif_b = $request->tarif_baru;
        $daya_l = $request->daya_lama;
        $daya_b = $request->daya_baru;
        $lokasi = $request->lokasi_meter;

        $result = TambahDaya::where('id', $id)->update([
            'tarif_lama'  =>  $request->tarif_lama,
            'tarif_baru'  =>  $request->tarif_baru,
            'daya_lama'  =>  $request->daya_lama,
            'daya_baru'  =>  $request->daya_baru,
            'lokasi_meter' =>  $request->lokasi_meter
        ]);

        if($result){
            Alert::success('Success', 'Data Tambah Daya berhasil di update');
            return redirect()->route('admin.list_permohonan.index');
        } else {
            Alert::error('Error', 'Data gagal di update.');
            return redirect()->route('admin.tambah.daya', $id);
        }

    }

    public function Slb(Request $request, $id)
    {

    }

    public function Sml(Request $request, $id)
    {

    }



}


