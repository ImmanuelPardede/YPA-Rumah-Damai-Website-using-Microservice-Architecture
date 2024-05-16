<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrangTuaWaliTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orang_tua_wali', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anak_id');
            $table->unsignedBigInteger('agama_id')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->bigInteger('nik_ayah')->nullable();
            $table->bigInteger('nik_ibu')->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            $table->date('tanggal_lahir_ibu')->nullable();
            $table->string('alamat_orangtua')->nullable();
            $table->string('pendidikan_ayah_id')->nullable();
            $table->unsignedBigInteger('pekerjaan_ayah_id')->nullable();
            $table->bigInteger('no_hp_ayah')->nullable();
            $table->string('pendidikan_ibu_id')->nullable();
            $table->unsignedBigInteger('pekerjaan_ibu_id')->nullable();
            $table->bigInteger('no_hp_ibu')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('alamat_wali')->nullable();
            $table->unsignedBigInteger('pekerjaan_wali_id')->nullable();
            $table->date('tanggal_lahir_wali')->nullable();
            $table->timestamps();
            
            $table->foreign('anak_id')->references('id')->on('anak');
            $table->foreign('agama_id')->references('id')->on('agama');
            $table->foreign('pekerjaan_ayah_id')->references('id')->on('pekerjaan');
            $table->foreign('pekerjaan_ibu_id')->references('id')->on('pekerjaan');
            $table->foreign('pekerjaan_wali_id')->references('id')->on('pekerjaan');
            $table->bigInteger('no_hp_wali')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orang_tua_wali');
    }
}
