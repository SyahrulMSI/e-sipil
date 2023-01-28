<?php

namespace App\Http\Controllers\Admin\DataTugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\User;
use Alert;
use GuzzleHttp\Client;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' =>  'Data Tugas',
            'tugas' =>  Tugas::orderBy('id', 'DESC')->get()
        );

        return view('pages.admin.tugas.index', $data);
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

        $data = Tugas::where('id', $id)->first();

        $user = User::where('id',$data->id_pelanggan)->first();

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

        $token = env('WA_BLAS_URL');
        $url = env('WA_BLAS_URL');

        $client = new Client();

        $client->post($url, [
            'headers'   =>  [
                'Authorization' =>  $token
            ],
            'form_params'  =>  $data
        ]);

            Alert::success('Berhasil', 'Status berhasil di update');
            return redirect()->route('admin.data_tugas.index');
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

    public function buatTagihanPelunasan($id)
    {

        $t = Tugas::where('id', $id)->first();

        $data = array(
            'title' =>  'Buat Tagihan',
            't' =>  $t
        );

        return view('pages.admin.transaksi.pelunasan.create', $data);
    }

    public function waNotif($data)
    {
        $token = 'TX8FsvpO64vCOVwK8ysBm70uQp9dSB24RlTeQmf4sKofEyeiW6JxbrFW9ZNaA1Qp';

        $client = new Client();

        $data = [
            'phone' => '085641739560',
            'message' => 'hello there',
            ];

        $response = $client->post('https://jogja.wablas.com/api/send-message', [
            'headers'  =>  [
                'Authorization' =>  $token
            ],
            'form_params'  =>  $data
        ]);

    }
}
