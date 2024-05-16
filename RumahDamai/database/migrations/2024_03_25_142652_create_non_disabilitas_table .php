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
        Schema::create('non_disabilitas', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_non_disabilitas');
            $table->string('jenis_non_disabilitas');
            $table->string('deskripsi', 2000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disabilitas');
    }
};
