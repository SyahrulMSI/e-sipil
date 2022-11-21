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
        Schema::create('detail_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->index('fk_detail_user_to_users');
            $table->string('profile')->nullable();
            $table->string('npmwp', 12)->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('kelurahan', 20)->nullable();
            $table->string('kecamatan', 20)->nullable();
            $table->string('kabupaten', 15)->nullable();
            $table->string('provinsi', 10)->nullable();
            $table->enum('jenis_identitas', ['ktp', 'kis', 'kip', 'sim'])->nullable();
            $table->string('no_identitas', 20)->nullable();
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
        Schema::dropIfExists('detail_user');
    }
};
