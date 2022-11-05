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
        Schema::table('tugas', function (Blueprint $table) {
            $table->foreign('id_pelanggan', 'fk_tugas_to_pelanggan')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_petugas', 'fk_tugas_to_petugas')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_tambah_daya', 'fk_tugas_to_tambah_daya')->references('id')->on('tambah_daya')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_pemasangan_baru', 'fk_tugas_to_pemasangan_baru')->references('id')->on('pemasangan_baru')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_instalasi', 'fk_tugas_to_instalasi')->references('id')->on('instalasi')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_service', 'fk_tugas_to_service')->references('id')->on('service')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tugas', function (Blueprint $table) {
            $table->dropForeign('fk_tugas_to_pelanggan');
            $table->dropForeign('fk_tugas_to_petugas');
            $table->dropForeign('fk_tugas_to_tambah_daya');
            $table->dropForeign('fk_tugas_to_pemasangan_baru');
            $table->dropForeign('fk_tugas_to_instalasi');
            $table->dropForeign('fk_tugas_to_service');
        });
    }
};
