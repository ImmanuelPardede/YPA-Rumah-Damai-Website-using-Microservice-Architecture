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
        Schema::create('PPI_Model_A', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anak_id');

            $table->foreign('anak_id')->references('id')->on('anak');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PPI_Model_A');
    }
};
