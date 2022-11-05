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
            $table->string('profile');
            $table->string('npmwp', 12);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('kelurahan', 20);
            $table->string('kecamatan', 20);
            $table->string('kabupaten', 15);
            $table->string('provinsi', 10);
            $table->enum('jenis_identitas', ['ktp', 'kis', 'kip', 'sim']);
            $table->string('no_identitas', 20);
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
