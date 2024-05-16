<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPembelajaranTable extends Migration
{
    public function up()
    {
        Schema::create('jadwal_pembelajaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('minggu_pembelajaran_id');
            $table->unsignedBigInteger('modul_materi_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lokasi_penugasan_id');
            $table->date('tanggal_pembelajaran')->nullable();
            $table->string('hari_pembelajaran')->nullable();
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->timestamps();

            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('minggu_pembelajaran_id')->references('id')->on('minggu_pembelajaran')->onDelete('cascade');
            $table->foreign('modul_materi_id')->references('id')->on('modul_materi')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lokasi_penugasan_id')->references('id')->on('lokasi_penugasan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_pembelajaran');
    }
}

