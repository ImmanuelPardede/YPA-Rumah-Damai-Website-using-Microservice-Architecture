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
        Schema::create('anak_non_disabilitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anak_id');
            $table->string('nama_lengkap')->nullable();
            $table->string('kategori_anak_non_disabilitas')->nullable();
            $table->string('jenis_anak_non_disabilitas')->nullable();
            $table->string('tipe_anak')->nullable();
            $table->string('deskripsi', 2000)->nullable();
            $table->timestamps();

            $table->foreign('anak_id')->references('id')->on('anak')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anak_non_disabilitas');
    }
};
