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
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('latar_belakang',3000)->nullable();
            $table->string('img_yayasan')->nullable();
            $table->string('visi',3000)->nullable();
            $table->string('misi',3000)->nullable();
            $table->string('wilayah1',2000)->nullable();
            $table->string('wilayah2',2000)->nullable();
            $table->string('img_wilayah1')->nullable();
            $table->string('img_wilayah2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
