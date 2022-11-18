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
        Schema::table('service', function (Blueprint $table) {
            $table->string('nomor_registrasi', 20)->after('id_user');
            $table->date('tanggal')->after('nomor_registrasi');
            $table->string('alamat')->after('tanggal');
            $table->string('status_permohonan', 4)->after('jenis_service');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service', function (Blueprint $table) {
            $table->dropColumn('nomor_registrasi');
            $table->dropColumn('tanggal');
            $table->dropColumn('alamat');
            $table->dropColumn('status_permohonan');
        });
    }
};
