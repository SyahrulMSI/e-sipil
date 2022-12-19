<?php

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Midtrans\Config;
use Illuminate\Support\Str;



if(!function_exists("getSnapRedirect")){

    function __construct()
    {
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Midtrans\Config::$isSanitized = env('MIDTRANS_SANITIZED');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
    }

    function getSnapRedirect(Transaksi $transaksi){
        $transaksiId = $transaksi->id.'-'.'3S'. Str::random(4);
        $transaksi->midtrans_booking_code = $transaksiId;
        $price = $transaksi->total_bayar;

        $transaction_details = [
            'order_id'  => $transaksiId,
            'gross_amount'  =>  $price,
        ];

        $item_details[] = [
            'id'    => $transaksiId,
            'price' => $price,
            'quantity'   =>  1,
            'name'  => 'Down Payment E-BTL'
        ];

        $userData = [
            'first_name'    =>  $transaksi->User->nama_lengkap,
            'last_name'     =>  "",
            "address"       =>  "",
            "city"          =>  $transaksi->User->DetailUSer()->first()->kelurahan,
            'postal_code'   =>  "",
            'phone'         =>  $transaksi->User->no_telp,
            'country_code'  =>  "IDN"
        ];

        $customer_details = [
            'first_name'    =>  $transaksi->User->nama_lengkap,
            'last_name'     =>  "",
            'email'         =>  $transaksi->User->email,
            'phone'         =>  $transaksi->User->no_telp,
            'billing_address'   => $userData,
            'shipping_address'  =>  $userData
        ];

        $midtrans_params = [
            'transaction_details'   =>  $transaction_details,
            'customer_details'      =>  $customer_details,
            'item_details'          =>  $item_details
        ];

        try{

            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
            $transaksi->url_midtrans = $paymentUrl;
            $transaksi->save();

            // return $paymentUrl;
            return redirect()->route('admin.list_permohonan.index');

        } catch (Exception $e) {
            return $e;
        }
    }

// }

// if(!function_exists("midtransCallback")){

    function midtransCallback(Request $request)
    {
        $notif = $request->method() == 'POST' ? new Midtrans\Notification() : Midtrans\Transaction::status($request->order_id);

        $transaction_status = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $transaksi_id =  explode('-', $notif->order_id)[0];

        $transaksi = Transaksi::find($transaksi_id);



        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
            // TODO Set payment status in merchant's database to 'challenge'
                $transaksi->status = 'PENDING';
            }
            else if ($fraud == 'accept') {
            // TODO Set payment status in merchant's database to 'success'
            $transaksi->status = 'PAID';
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
            $transaksi->status = 'PENDING';
        }
        else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $transaksi->status = 'FAILED';
        }

        $transaksi->save();

        return $transaksi;

        return redirect()->route('customer.transaksi_dp.index');
    }

}


