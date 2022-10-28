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
        Schema::table('diagnosas', function (Blueprint $table) {
            $table->string('kode_diagnosa', 100);
            $table->unsignedBigInteger('poli_id');
            $table->foreign('poli_id')->references('id')->on('polis');
            $table->unsignedBigInteger('nmpoli_id');
            $table->foreign('nmpoli_id')->references('id')->on('reqpasiens');

            $table->unsignedBigInteger('pasien_id');
            $table->foreign('pasien_id')->references('id')->on('pasiens');
            $table->unsignedBigInteger('dokter_id');
            $table->foreign('dokter_id')->references('id')->on('dokters');
            $table->unsignedBigInteger('obat_id');
            $table->foreign('obat_id')->references('id')->on('obats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diagnosas', function (Blueprint $table) {

                $table->dropForeign('diagnosas_poli_id_foreign');
                $table->dropColumn('poli_id');
                $table->dropForeign('diagnosas_nmpoli_id_foreign');
                $table->dropColumn('nmpoli_id');
                $table->dropForeign('diagnosas_pasien_id_foreign');
                $table->dropColumn('pasien_id');
                $table->dropForeign('diagnosas_obat_id_foreign');
                $table->dropColumn('obat_id');

        });
    }
};