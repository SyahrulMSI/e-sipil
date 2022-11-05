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
        Schema::table('transaksi', function (Blueprint $table) {
            $table->foreign('id_user', 'fk_transaksi_to_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_tambah_daya', 'fk_transaksi_to_tambah_daya')->references('id')->on('tambah_daya')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_pemasangan_baru', 'fk_transaksi_to_pemasangan_baru')->references('id')->on('pemasangan_baru')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_instalasi', 'fk_transaksi_to_instalasi')->references('id')->on('instalasi')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_service', 'fk_transaksi_to_service')->references('id')->on('service')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign('fk_transaksi_to_users');
            $table->dropForeign('fk_transaksi_to_tambah_daya');
            $table->dropForeign('fk_transaksi_to_pemasangan_baru');
            $table->dropForeign('fk_transaksi_to_instalasi');
            $table->dropForeign('fk_transaksi_to_service');
        });
    }
};
