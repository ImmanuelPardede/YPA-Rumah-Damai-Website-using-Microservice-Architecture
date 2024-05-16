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
        Schema::create('detail_PPI_Model_A', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ppiA_id');
            $table->string('gambaran_sensory')->nullable();
            $table->string('data_medis')->nullable();
            $table->string('hal_disukai')->nullable();
            $table->string('kondisi_lain')->nullable();
            $table->timestamps();

            $table->foreign('ppiA_id')->references('id')->on('PPI_Model_A');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_PPI_Model_A');
    }
};
