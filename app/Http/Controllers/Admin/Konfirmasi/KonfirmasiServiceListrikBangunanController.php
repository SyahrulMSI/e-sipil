<?php

namespace App\Http\Controllers\Admin\Konfirmasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Alert;
use App\Models\Service;
use App\Models\User;
use Midtrans;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class KonfirmasiServiceListrikBangunanController extends Controller
{

    public function __construct()
    {
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Midtrans\Config::$isSanitized = env('MIDTRANS_SANITIZED');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id )
    {

        $slb = Service::where('id', $id)->where('jenis_service', 'listrik_bangunan')->first();

        $user = User::where('id', $slb->id_user)->first();

        $data = array(
            'title' =>  'Konfirmasi Service Listrik Bangunan',
            'slb'    => $slb,
            'u'     =>  $user
        );

        return view('pages.admin.konfirmasi.slb', $data);
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
    public function store(Request $request, $id)
    {
        $request->validate([
            'total_bayar'   =>  'required',
            'type_pembayaran'   =>  'required'
        ]);

        Service::where('id', $id)->update([
            'status_permohonan' =>  1
        ]);

        $slb = Service::where('id', $id)->first();

        $result = Transaksi::create([
            'id_user'   =>  $slb->id_user,
            'id_service'    => $slb->id,
            'total_bayar'   =>  $request->total_bayar,
            'type_pembayaran'   =>  $request->type_pembayaran,
            'status'    =>  'WAITING',
            'tanggal_transaksi' =>  date('Y-m-d')
        ]);

        $nominal = $request->total_bayar;

        getSnapRedirect($result);

        if($result){

            $user = User::where('id', $slb->id_user)->first();

            $this->sendNotification($user, $nominal);

            Alert::success('Berhasil', 'Tagihan berhasil di buat');
            return redirect()->route('admin.list_permohonan.index');
        }  else {
            Alert::error('Gagal','Tagihan gagal di buat');
            return redirect()->route('admin.list_permohonan.index');
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


    public function sendNotification($user, $nominal)
    {

        $url = env('WA_BLAS_URL');
        $token = env('WA_BLAS_KEY');

        $client = new Client();

        $data = [
            'phone' => $user->no_telp,
            'message' => 'Salam, Kami Pihak PT. SUMBER SAE SATU menyampaikan bahwa Uang Muka yang harus anda bayarkan pada pelayanan Service Listrik Bangunan sebesar Rp. ' . number_format($nominal, 0),
        ];

        $client->post($url, [
            'headers'   =>  [
                "Authorization" => $token
            ],
            'form_params'  => $data
        ]);

    }

    public function midtransCallback(Request $request)
    {
        $notif = $request->method() == 'POST' ? new Midtrans\Notification() : Midtrans\Transaction::status($request->order_id);

        $transaction_status = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $transaksi_id =  explode('-', $notif->order_id)[0];

        $transaksi = Transaksi::find($transaksi_id);

        $nominal = $transaksi->total_bayar;
        $user = User::where('id', $transaksi->id_user)->first();

        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
            // TODO Set payment status in merchant's database to 'challenge'
                $transaksi->status = 'PENDING';
            }
            else if ($fraud == 'accept') {
            // TODO Set payment status in merchant's database to 'success'
            $transaksi->status = 'SUCCESS';
            }
        }
        else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
            // TODO Set payment status in merchant's database to 'failure'
            $transaksi->status = 'FAILED';
            }
            else if ($fraud == 'accept') {
            // TODO Set payment status in merchant's database to 'failure'
            $transaksi->status = 'FAILED';
            }
        }
        else if ($transaction_status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $transaksi->status = 'FAILED';
        }
        else if ($transaction_status == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $transaksi->status = 'PAID';
        }
        else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $transaksi->status = 'SUCCESS';
        }
        else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $transaksi->status = 'FAILED';
        }

        $transaksi->save();

        // return $transaksi;

        // return redirect('/');

         if($transaksi->id_tambah_daya != null) {
            $layanan = 'Tambah Daya Meter Listirk';
        }else if($transaksi->id_pemasangan_baru != null) {
              $layanan = 'Pemasangan Meter Baru';
        }else if($transaksi->id_instalasi != null) {
            $layanan = 'Instalasi Bangunan Baru';
        }else if($transaksi->id_service != null) {
            $layanan = 'Service Meter / bangunan';
        }


        if($transaksi->type_pembayaran == 'dp'){

            $this->pembayaranDp($user, $nominal, $layanan);

        } else {

            $this->pembayaranLunas($user, $nominal,  $layanan);

        }

        return redirect()->route('customer.success.index');
    }

    public function pembayaranDp($user, $nominal,  $layanan)
    {
        $url = env('WA_BLAS_URL');
        $token = env('WA_BLAS_KEY');

        $client = new Client();

        $data = [
            'phone' => $user->no_telp,
            'message' => 'Salam, Kami Pihak PT. SUMBER SAE SATU menyampaikan bahwa Uang Muka anda telah terbayarkan pada pelayanan '.  $layanan  .' sebesar Rp. ' . number_format($nominal, 0),
        ];

        $client->post($url, [
            'headers'   =>  [
                "Authorization" => $token
            ],
            'form_params'  => $data
        ]);
    }

    public function pembayaranLunas($user, $nominal, $layanan){
        $url = env('WA_BLAS_URL');
        $token = env('WA_BLAS_KEY');

        $client = new Client();

        $data = [
            'phone' => $user->no_telp,
            'message' => 'Salam, Kami Pihak PT. SUMBER SAE SATU menyampaikan bahwa pelunasan anda telah terbayarkan pada pelayanan '.  $layanan  .' sebesar Rp. ' . number_format($nominal, 0) . 'Terima Kasih atas kepercayaan anda. Hubungi kami jika terdapat kendala pada pemasangan kami',
        ];

        $client->post($url, [
            'headers'   =>  [
                "Authorization" => $token
            ],
            'form_params'  => $data
        ]);
    }
}
