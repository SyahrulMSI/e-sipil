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
        Schema::table('tagihan_pelunasan', function (Blueprint $table) {
            $table->foreign('id_user', 'fk_tagihan_pelunasan_to_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_transaksi', 'fk_tagihan_pelunasan_to_transaksi')->references('id')->on('transaksi')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tagihan_pelunasan', function (Blueprint $table) {
            $table->dropForeign('fk_tagihan_pelunasan_to_users');
            $table->dropForeign('fk_tagihan_pelunasan_to_transaksi');
        });
    }
};
