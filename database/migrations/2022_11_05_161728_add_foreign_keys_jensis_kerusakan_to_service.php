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
        Schema::table('jenis_kerusakan', function (Blueprint $table) {
            //$table->foreign('id_service', 'fk_jenis_kerusakan_to_service')->references('id')->on('service')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jenis_kerusakan', function (Blueprint $table) {
            //$table->dropForeign('fk_jenis_kerusakan_to_service');
        });
    }
};
