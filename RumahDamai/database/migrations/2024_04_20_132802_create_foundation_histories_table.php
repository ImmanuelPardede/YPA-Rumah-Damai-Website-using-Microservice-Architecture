<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('foundation_histories', function (Blueprint $table) {
            $table->id();
            $table->string('gambar'); // Kolom untuk nama file gambar
            $table->string('sejarah_singkat',2000); // Kolom untuk sejarah yayasan
            $table->string('tujuan_utama',2000); // Kolom untuk tujuan utama yayasan
            $table->date('dibangun'); // Kolom tanggal pendirian yayasan
            $table->integer('jumlah_anak')->unsigned()->default(0); // Kolom jumlah anak yang dilayani yayasan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foundation_histories');
    }
};
