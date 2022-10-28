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
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();
            $table->string('kode_resep', 100);
            $table->unsignedBigInteger('pasien_id');
            $table->foreign('pasien_id')->references('id')->on('pasiens');
            $table->string('nm_pasien',255);
            $table->date('tgl_daftar');
            $table->text('diagnosa');
            $table->unsignedBigInteger('poli_id');
            $table->foreign('poli_id')->references('id')->on('polis');
            $table->unsignedBigInteger('dokter_id');
            $table->foreign('dokter_id')->references('id')->on('dokters');
            $table->unsignedBigInteger('obat_id');
            $table->foreign('obat_id')->references('id')->on('obats');

            $table->string('jumlah',255);
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
        Schema::dropIfExists('reseps');
        Schema::table('reseps', function (Blueprint $table) {
            $table->dropForeign('reseps_poli_id_foreign');
            $table->dropColumn('poli_id');
            $table->dropForeign('reseps_nmpoli_id_foreign');
            $table->dropColumn('nmpoli_id');
            $table->dropForeign('reseps_pasien_id_foreign');
            $table->dropColumn('pasien_id');
            $table->dropForeign('reseps_obat_id_foreign');
            $table->dropColumn('obat_id');
        });

    }
};
