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
        Schema::create('tujuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detailppiA_id');
            $table->string('bina_diri')->nullable();
            $table->string('jangka')->nullable();
            $table->string('sosialisasi_dan_komunikasi')->nullable();
            $table->string('bekerja')->nullable();
            $table->string('akademik')->nullable();
            $table->timestamps();


            if (Schema::hasTable('detail_PPI_Model_A')) {
                $table->foreign('detailppiA_id')->references('id')->on('detail_PPI_Model_A');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tujuan');
    }
};
