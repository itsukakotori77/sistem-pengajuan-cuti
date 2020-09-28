<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutiTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuti', function (Blueprint $table) {
            $table->id('ID_Cuti');
            $table->integer('Jenis_Cuti');
            $table->date('Tanggal_Mulai');
            $table->date('Tanggal_Berakhir');
            $table->string('Alasan');
            $table->integer('Persetujuan');
            $table->integer('Status');
            $table->string('Pegawai_ID');
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
        Schema::dropIfExists('cuti');
    }
}
