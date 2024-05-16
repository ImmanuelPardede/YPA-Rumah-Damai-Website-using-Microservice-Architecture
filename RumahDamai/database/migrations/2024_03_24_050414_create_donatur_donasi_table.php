<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonaturDonasiTable extends Migration
{
    public function up()
    {
        Schema::create('donatur_donasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donasi_id');
            $table->unsignedBigInteger('donatur_id');
            $table->timestamps();

            $table->foreign('donasi_id')->references('id')->on('donasi')->onDelete('cascade');
            $table->foreign('donatur_id')->references('id')->on('donatur')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('donatur_donasi');
    }
}
