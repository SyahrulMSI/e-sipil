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


}


