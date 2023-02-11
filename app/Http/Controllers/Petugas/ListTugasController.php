<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tugas;
use Auth;
use Alert;
use GuzzleHttp\Client;
use App\Models\User;

use App\Models\TambahDaya;
use App\Models\PemasanganBaru;
use App\Models\InstalasiBangunan;
use App\Models\Service;

class ListTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tugas = Tugas::where('id_petugas', Auth::user()->id)->orderBy('id', 'DESC')->get();

        $data = array(
            'title'     =>  'List Tugas',
            'tugas'     =>  $tugas
        );


        return view('pages.petugas.list_tugas.index', $data);
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
        $tgs = Tugas::findOrFail($id);

        $user = User::where('id', $tgs->id_pelanggan)->first();

        $status = $request->status;

        $result = Tugas::where('id', $id)->update([
            'status'    =>  $status
        ]);

        $st = $status;

        if($st == 1){
            $data = [
                'phone' => $user->no_telp,
                'message' => 'Status pengerjaan kamu sekarang adalah Di Konfirmasi',
            ];
        } elseif($st == 2){
            $data = [
                'phone' => $user->no_telp,
                'message' => 'Status pengerjaan kamu sekarang adalah Survei & Prepare',
            ];
        } elseif($st == 3){
            $data = [
                'phone' => $user->no_telp,
                'message' => 'Status pengerjaan kamu sekarang adalah Proses',
            ];
        }elseif($st == 4){
            $data = [
                'phone' => $user->no_telp,
                'message' => 'Status pengerjaan kamu sekarang adalah Testing',
            ];
        }elseif($st == 5){
            $data = [
                'phone' => $user->no_telp,
                'message' => 'Status pengerjaan kamu sekarang adalah Finishing',
            ];
        }elseif($st == 6){
            $data = [
                'phone' => $user->no_telp,
                'message' => 'Status pengerjaan kamu sekarang adalah Selesai',
            ];
        }

        if($result){

            if($tgs->id_tambah_daya != null){

                TambahDaya::where('id', $tgs->id_tambah_daya)->update([
                    'status_permohonan' => $request->status
                ]);

            } else if($tgs->id_pemasangan_baru != null){
                PemasanganBaru::where('id', $tgs->id_pemasangan_baru)->update([
                    'status_permohonan' => $request->status
                ]);
            } else if($tgs->id_instalasi != null){
                InstalasiBangunan::where('id', $tgs->id_instalasi)->update([
                    'status_permohonan' => $request->statuws
                ]);
            } else if($tgs->id_service != null){
                Service::where('id', $tgs->id_service)->update([
                    'status_permohonan' => $request->status
                ]);
            }

            $this->waNotif($data);

            Alert::success('Berhasil', 'Status berhasil di update');
            return redirect()->route('petugas.list_tugas.index');

        } else {

        }
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

    public function waNotif($data)
    {
        $url = env('WA_BLAS_URL');
        $token = env('WA_BLAS_KEY');

        $client = new Client();

        $client->post($url, [
            'headers'   =>  [
                "Authorization" => $token
            ],
            'form_params'  => $data
        ]);


    }
}
