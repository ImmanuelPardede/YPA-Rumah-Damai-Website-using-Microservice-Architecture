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
        Schema::create('detailraports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('raport_id'); // Perhatikan bahwa kita menggunakan unsignedBigInteger
            $table->string('area')->nullable(); 
            $table->string('kemampuan')->nullable(); 
            $table->string('kelas_kemampuan')->nullable(); 
            $table->string('naratif', 10000)->nullable(); 
            $table->timestamps();

            $table->foreign('raport_id')->references('id')->on('raport'); // Perhatikan bahwa nama tabel utama adalah 'raport', bukan 'raports'

        });
    }    
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailraports');
    }
};
