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
        Schema::create('tagihan_pelunasan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->index('fk_tagihan_pelunasan_to_users');
            $table->foreignId('id_transaksi')->index('fk_tagihan_pelunasan_to_transaksi');
            $table->longText('description')->nullable();
            $table->string('total_tagihan');
            $table->string('type_pembayaran')->nullable();
            $table->string('url_midtrans')->nullable();
            $table->string('status');
            $table->date('tanggal_tagihan');
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
        Schema::dropIfExists('tagihan_pelunasan');
    }
};
