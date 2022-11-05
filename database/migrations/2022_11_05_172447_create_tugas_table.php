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
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelanggan')->index('fk_tugas_to_pelanggan');
            $table->foreignId('id_petugas')->index('fk_tugas_to_petugas');
            $table->foreignId('id_tambah_daya')->index('fk_tugas_to_tambah_daya')->nullable();
            $table->foreignId('id_pemasangan_baru')->index('fk_tugas_to_pemasangan_baru')->nullable();
            $table->foreignId('id_instalasi')->index('fk_tugas_to_instalasi')->nullable();
            $table->foreignId('id_service')->index('fk_tugas_to_service')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('tugas');
    }
};
