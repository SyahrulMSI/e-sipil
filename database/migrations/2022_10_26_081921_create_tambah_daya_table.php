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
        Schema::create('tambah_daya', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->index('fk_tambah_daya_to_users');
            $table->string('nomor_registrasi', 20);
            $table->date('tanggal');
            $table->string('tarif_lama', 10);
            $table->string('tarif_baru', 10);
            $table->string('daya_lama', 10);
            $table->string('daya_baru', 10);
            $table->string('lokasi_meter', 50);
            $table->string('status_permohonan', 50);
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
        Schema::dropIfExists('tambah_daya');
    }
};
