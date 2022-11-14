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
        Schema::create('pemasangan_baru', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->index('fk_pemasangan_baru_to_users');
            $table->string('nomor_registrasi', 20);
            $table->date('tanggal');
            $table->enum('jenis_pemasangan', ['rumah','bisnis','perusahaan']);
            $table->enum('daya', [250,450,900,1300,2200,3500,4400,5500,7700,13900,1700,3900,6600,20600,13200,16500,23000,33000,41500,5300,66000,82500,105000,131000,147000,164000]);
            $table->string('lokasi_pemasangan', 50);
            $table->string('status_permohonan', 10);
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
        Schema::dropIfExists('pemasangan_baru');
    }
};
