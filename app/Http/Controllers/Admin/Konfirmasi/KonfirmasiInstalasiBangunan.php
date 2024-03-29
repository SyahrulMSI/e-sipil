<?php

namespace App\Http\Controllers\Admin\Konfirmasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Alert;
use App\Models\InstalasiBangunan;
use App\Models\User;
use Exception;
use Str;
use Midtrans;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class KonfirmasiInstalasiBangunan extends Controller
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
    public function index($id)
    {
        $ib = InstalasiBangunan::where('id', $id)->first();

        $user = User::where('id', $ib->id_user)->first();

        $data = array(
            'title' =>  'Konfirmasi Instalasi Bangunan',
            'ib'    =>  $ib,
            'u'     =>  $user
        );

        return view('pages.admin.konfirmasi.instalasibangunan', $data);
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
            'jumlah_titik'  =>  'required',
            'total_bayar'   =>  'required',
            'type_pembayaran'   =>  'required'
        ]);

        InstalasiBangunan::where('id', $id)->update([
            'jumlah_titik'   =>  $request->jumlah_titik,
            'status_permohonan' =>  2
        ]);

        $ib = InstalasiBangunan::where('id', $id)->first();

        $result = Transaksi::create([
            'id_user'   =>  $ib->id_user,
            'id_instalasi'    => $ib->id,
            'total_bayar'   =>  $request->total_bayar,
            'type_pembayaran'   =>  $request->type_pembayaran,
            'status'    =>  'WAITING',
            'tanggal_transaksi' =>  date('Y-m-d')
        ]);

        $nominal = $request->total_bayar;

        // $this->getSnapRedirect($result);
        getSnapRedirect($result);

        if($result){

            $user = User::where('id', $ib->id_user)->first();

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
            'message' => 'Salam, Kami Pihak PT. SUMBER SAE SATU menyampaikan bahwa Uang Muka yang harus anda bayarkan pada pelayanan Instalasi Bangunan Baru sebesar Rp. ' . number_format($nominal, 0),
        ];

        $client->post($url, [
            'headers'   =>  [
                "Authorization" => $token
            ],
            'form_params'  => $data
        ]);

    }

    // public function getSnapRedirect(Transaksi $transaksi){

    //     $transaksiId = $transaksi->id.'-'.'3S'.Str::random(4);
    //     $transaksi->midtrans_booking_code = $transaksiId;
    //     $price = $transaksi->total_bayar;

    //     $transaction_details = [
    //         'order_id'  => $transaksiId,
    //         'gross_amount'  =>  $price,
    //     ];

    //     $item_details[] = [
    //         'id'    => $transaksiId,
    //         'price' => $price,
    //         'quantity'   =>  1,
    //         'name'  => 'Down Payment E-BTL'
    //     ];

    //     $userData = [
    //         'first_name'    =>  $transaksi->User->nama_lengkap,
    //         'last_name'     =>  "",
    //         "address"       =>  "",
    //         "city"          =>  $transaksi->User->DetailUSer()->first()->kelurahan,
    //         'postal_code'   =>  "",
    //         'phone'         =>  $transaksi->User->no_telp,
    //         'country_code'  =>  "IDN"
    //     ];

    //     $customer_details = [
    //         'first_name'    =>  $transaksi->User->nama_lengkap,
    //         'last_name'     =>  "",
    //         'email'         =>  $transaksi->User->email,
    //         'phone'         =>  $transaksi->User->no_telp,
    //         'billing_address'   => $userData,
    //         'shipping_address'  =>  $userData
    //     ];

    //     $midtrans_params = [
    //         'transaction_details'   =>  $transaction_details,
    //         'customer_details'      =>  $customer_details,
    //         'item_details'          =>  $item_details
    //     ];

    //     try{

    //         $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
    //         $transaksi->url_midtrans = $paymentUrl;
    //         $transaksi->save();

    //         // return $paymentUrl;
    //         return redirect()->route('admin.list_permohonan.index');

    //     } catch (Exception $e) {
    //         return $e;
    //     }
    // }

    public function midtransCallback(Request $request)
    {
        $notif = $request->method() == 'POST' ? new Midtrans\Notification() : Midtrans\Transaction::status($request->order_id);

        $transaction_status = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $transaksi_id =  explode('-', $notif->order_id)[0];

        $transaksi = Transaksi::find($transaksi_id);

        $nominal = $transaksi->total_bayar;
        $user = User::where('id', $transaksi->user_id)->first();



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
            $transaksi->status = 'SUCCESS';
        }
        else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $transaksi->status = 'PENDING';
        }
        else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $transaksi->status = 'FAILED';
        }

        $transaksi->save();

        // return $transaksi;

        // return redirect('/');

        if($transaksi->type_pembayaran == 'dp'){

            $this->pembayaranDp($user, $nominal);

        } else {

            $this->pembayaranLunas($user, $nominal);

        }

        return redirect()->route('customer.success.index');

    }

    public function pembayaranDp($user, $nominal)
    {
        $url = env('WA_BLAS_URL');
        $token = env('WA_BLAS_KEY');

        $client = new Client();

        $data = [
            'phone' => $user->no_telp,
            'message' => 'Salam, Kami Pihak PT. SUMBER SAE SATU menyampaikan bahwa Uang Muka anda telah terbayarkan pada pelayanan Instalasi Bangunan Baru sebesar Rp. ' . number_format($nominal, 0),
        ];

        $client->post($url, [
            'headers'   =>  [
                "Authorization" => $token
            ],
            'form_params'  => $data
        ]);
    }

    public function pembayaranLunas($user, $nominal){
        $url = env('WA_BLAS_URL');
        $token = env('WA_BLAS_KEY');

        $client = new Client();

        $data = [
            'phone' => $user->no_telp,
            'message' => 'Salam, Kami Pihak PT. SUMBER SAE SATU menyampaikan bahwa pelunasan anda telah terbayarkan pada pelayanan Instalasi Bangunan Baru sebesar Rp. ' . number_format($nominal, 0) . 'Terima Kasih atas kepercayaan anda. Hubungi kami jika terdapat kendala pada pemasangan kami',
        ];

        $client->post($url, [
            'headers'   =>  [
                "Authorization" => $token
            ],
            'form_params'  => $data
        ]);
    }




}
