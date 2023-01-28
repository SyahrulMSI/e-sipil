<?php

namespace App\Http\Controllers\Customer\Layanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Models\InstalasiBangunan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\DetailUser;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;



class InstalasiBangunanBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'     =>      'Instalasi Bangunan Baru'
        );

        return view('pages.pelanggan.layanan.instalasibangunan.index', $data);
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
            'jenis_instalasi'   => 'required',
            'alamat'    =>  'required',
            'jumlah_titik'  =>  'required'
        ]);

        $jenis = $request->jenis_instalasi;
        $alamat = $request->alamat;
        $harga = $request->penetapan_harga_per_titik;
        $jml_titik = $request->jumlah_titik;

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
                'alamat'    =>  $alamat,
                'jenis_instalasi'   => $jenis,
                'penetapan_harga_per_titik'  =>  $harga,
                'jumlah_titik'  => $jml_titik,
                'status_permohonan' => 1,
            );

            $result = InstalasiBangunan::create($data);

            if($result){

                // $this->sendNotification();

                Alert::success('Berhasil', 'Data permohonan berhasil di buat.');
                return redirect()->route('customer.instalasi_bangunan_baru.index');
            } else {
                Alert::error('Gagal', 'Data permohonan gagal di buat.');
                return redirect()->route('customer.instalasi_bangunan_baru.index');
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

    public function sendNotification()
    {
    //     $client = new Client();
    //     $headers = [
    //         'headers' => [
    //             'Authorization' => 'DlmqqynWcHBemsW40dOMsh7qLPfrsJaD7u6SRFMwLN2HIvaaqP7cmWDxLkUFfcQi'
    //             ]
    //         ];

        $options = [
            'multipart' => [
              [
                'name' => 'phone',
                'contents' => '6285641739560'
              ],
              [
                'name' => 'message',
                'contents' => 'hello'
              ]
          ]];

        //   $request = new Request('POST', 'https://jogja.wablas.com/api/send-message', $headers);

        // $client->request('POST', 'https://jogja.wablas.com/api/send-message', [
        //     $headers,
        //     $options
        // ]);

        // $response = Http::withToken('DlmqqynWcHBemsW40dOMsh7qLPfrsJaD7u6SRFMwLN2HIvaaqP7cmWDxLkUFfcQi')->post('https://jogja.wablas.com/api/send-message',   [
        //     'name' => 'phone',
        //     'contents' => '6285641739560'
        //   ]);

          $response = Http::withHeaders([
            'Authorization' => 'DlmqqynWcHBemsW40dOMsh7qLPfrsJaD7u6SRFMwLN2HIvaaqP7cmWDxLkUFfcQi'
        ])->post('https://jogja.wablas.com/api/send-message', [
            'multipart' => [
                [
                  'name' => 'phone',
                  'contents' => '6285641739560'
                ],
                [
                  'name' => 'message',
                  'contents' => 'hello'
                ]
            ]
        ]);

        dd($response);



        }
}
