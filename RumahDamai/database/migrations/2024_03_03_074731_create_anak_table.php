<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnakTable extends Migration
{
    public function up()
    {
        Schema::create('anak', function (Blueprint $table) {
            $table->id();
            $table->string('foto_profil')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->unsignedBigInteger('agama_id')->nullable();
            $table->string('nia')->nullable();
            $table->unsignedBigInteger('jenis_kelamin_id')->nullable();
            $table->unsignedBigInteger('golongan_darah_id')->nullable();
            $table->unsignedBigInteger('kebutuhan_disabilitas_id')->nullable();
            $table->unsignedBigInteger('lokasi_id')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('disukai')->nullable();
            $table->string('tidak_disukai')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kelebihan')->nullable();
            $table->string('kekurangan')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->dateTime('tanggal_keluar')->nullable();
            $table->string('status')->default('aktif');
            $table->string('tipe_anak');
            $table->timestamps();

            $table->foreign('agama_id')->references('id')->on('agama');
            $table->foreign('lokasi_id')->references('id')->on('lokasi_penugasan');
            $table->foreign('jenis_kelamin_id')->references('id')->on('jenis_kelamin');
            $table->foreign('kebutuhan_disabilitas_id')->references('id')->on('kebutuhan_disabilitas');
            $table->foreign('golongan_darah_id')->references('id')->on('golongan_darah');
        });
    }


    public function down()
    {
        Schema::dropIfExists('anak');
    }
}
