<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id('ID_Pegawai');
            $table->string('Nama_Depan');
            $table->string('Nama_Belakang');
            $table->integer('Jenis_Kelamin');
            $table->string('Alamat');
            $table->string('Tempat_Lahir');
            $table->date('Tanggal_Lahir');
            $table->integer('Jabatan');
            $table->string('Divisi');
            $table->string('Atasan');
            $table->string('Foto');
            $table->integer('user_id');
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
        Schema::dropIfExists('pegawai');
    }
}
