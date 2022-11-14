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
        Schema::create('instalasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->index('fk_instalasi_to_users');
            $table->string('nomor_registrasi', 20);
            $table->date('tanggal');
            $table->longText('alamat');
            $table->enum('jenis_instalasi', ['rumah', 'panel_control']);
            $table->string('penetapan_harga_per_titik');
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
        Schema::dropIfExists('instalasi');
    }
};
