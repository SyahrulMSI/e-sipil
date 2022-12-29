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
        Schema::create('rincian_pelunasan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->index('rincian_pelunasan_to_users');
            $table->foreignId('id_transaksi')->index('rincian_pelunasan_to_transaksi');
            $table->longText('rincian')->nullable();
            $table->string('nominal_tagihan');
            $table->string('nominal_dp');
            $table->string('nominal_pelunasan');
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
        Schema::dropIfExists('rincian_pelunasan');
    }
};
