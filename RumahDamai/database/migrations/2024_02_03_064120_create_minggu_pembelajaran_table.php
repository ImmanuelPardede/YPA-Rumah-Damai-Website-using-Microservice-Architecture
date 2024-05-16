<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMingguPembelajaranTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('minggu_pembelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('minggu_pembelajaran');
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->unsignedBigInteger('lokasi_penugasan_id');
            $table->timestamps();

            $table->foreign('lokasi_penugasan_id')->references('id')->on('lokasi_penugasan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('minggu_pembelajaran', function (Blueprint $table) {
            $table->dropForeign(['lokasi_penugasan_id']);
        });

        Schema::dropIfExists('minggu_pembelajaran');
    }
}

