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
        Schema::create('raport', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anak_id');
            $table->string('periode_bulan')->nullable(); 
            $table->string('tahun', 4)->nullable(); 
            $table->timestamps();

            $table->foreign('anak_id')->references('id')->on('anak');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raport');
    }
};
