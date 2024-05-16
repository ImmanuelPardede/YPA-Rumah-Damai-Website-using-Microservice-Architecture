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
        Schema::create('detail_galeri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('galeri_id');
            $table->string('img_galeri');
            $table->timestamps();


            $table->foreign('galeri_id')->references('id')->on('galeri')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_galeri');
    }
};
