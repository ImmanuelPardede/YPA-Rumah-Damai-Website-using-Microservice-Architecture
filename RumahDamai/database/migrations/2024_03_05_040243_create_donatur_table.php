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
        Schema::create('donatur', function (Blueprint $table) {
            $table->id();
            $table->string('nama_donatur');
            $table->string('email_donatur')->unique();
            $table->date('tanggal_donatur');
            $table->string('no_hp_donatur');
            $table->string('deskripsi');
            $table->bigInteger  ('jumlah_donasi');
            $table->string('foto_donatur');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasi');
    }
};

