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
        Schema::table('reqpasiens', function (Blueprint $table) {
            $table->unsignedBigInteger('no_antrian_id')->after('tgl_daftar');
            $table->foreign('no_antrian_id')->references('id')->on('antrians');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reqpasiens', function (Blueprint $table) {
            //
        });
    }
};
