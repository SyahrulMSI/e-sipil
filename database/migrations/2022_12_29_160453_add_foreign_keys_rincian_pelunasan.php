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
        Schema::table('rincian_pelunasan', function (Blueprint $table) {
            $table->foreign('id_user', 'rincian_pelunasan_to_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_transaksi', 'rincian_pelunasan_to_transaksi')->references('id')->on('transaksi')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rincian_pelunasan', function (Blueprint $table) {
            $table->dropForeign('rincian_pelunasan_to_users');
            $table->dropForeign('rincian_pelunasan_to_transaksi');
        });
    }
};
