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
        Schema::table('pemasangan_baru', function (Blueprint $table) {
            $table->foreign('id_user', 'fk_pemasangan_baru_to_users')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemasangan_baru', function (Blueprint $table) {
            $table->dropForeign('fk_pemasangan_baru_to_users');
        });
    }
};
