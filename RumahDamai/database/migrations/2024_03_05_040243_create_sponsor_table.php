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
        Schema::create('sponsor', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sponsor');
            $table->string('email_sponsor')->unique();
            $table->date('tanggal_sponsor');
            $table->string('no_telepon_sponsor');
            $table->string('deskripsi');
            $table->bigInteger  ('jumlah_sponsor');
            $table->string('foto_sponsor');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsorship');
    }
};

