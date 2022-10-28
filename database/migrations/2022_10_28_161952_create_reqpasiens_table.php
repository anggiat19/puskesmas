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
        Schema::create('reqpasiens', function (Blueprint $table) {
            $table->id();
            $table->string('no_antrian', 100);
            $table->date('tgl_daftar');
            $table->string('no_pasien', 100);
            $table->string('no_identitas', 100);
            $table->date('tgl_lhr');
            $table->string('tmpt_lhr', 100);
            $table->string('umur', 100);
            $table->text('alamat');
            $table->string('telepon', 100);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('keluhan');
            $table->string('poli', 100);
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
        Schema::dropIfExists('reqpasiens');
    }
};
