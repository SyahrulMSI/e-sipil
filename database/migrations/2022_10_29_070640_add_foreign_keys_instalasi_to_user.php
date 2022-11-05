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
        Schema::table('instalasi', function (Blueprint $table) {
            $table->foreign('id_user', 'fk_instalasi_to_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instalasi', function (Blueprint $table) {
            $table->dropForeign('fk_instalasi_to_users');
        });
    }
};
