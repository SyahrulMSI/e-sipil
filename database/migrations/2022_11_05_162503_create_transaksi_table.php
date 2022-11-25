<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->index('fk_transaksi_to_users');
            $table->foreignId('id_tambah_daya')->index('fk_transaksi_to_tambah_daya')->nullable();
            $table->foreignId('id_pemasangan_baru')->index('fk_transaksi_to_pemasangan_baru')->nullable();
            $table->foreignId('id_instalasi')->index('fk_transaksi_to_instalasi')->nullable();
            $table->foreignId('id_service')->index('fk_transaksi_to_service')->nullable();
            $table->string('total_bayar');
            $table->string('type_pembayaran');
            $table->string('url_midtrans')->nullable();
            $table->string('status');
            $table->date('tanggal_transaksi');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
