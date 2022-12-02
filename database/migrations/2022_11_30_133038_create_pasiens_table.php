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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('kode_p', 255);
            $table->string('nama_p', 255);
            $table->enum('jenis_kel_p', ['L', 'P']);
            $table->date('tgl_lahir_p');
            $table->string('telp_p', 100);
            $table->text('alamat_p');
            $table->string('nama_kel_p', 100);
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
        Schema::dropIfExists('pasiens');
    }
};