<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorSponsorshipTable extends Migration
{
    public function up()
    {
        Schema::create('sponsor_sponsorship', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sponsorship_id');
            $table->unsignedBigInteger('sponsor_id');
            $table->timestamps();

            $table->foreign('sponsorship_id')->references('id')->on('sponsorship')->onDelete('cascade');
            $table->foreign('sponsor_id')->references('id')->on('sponsor')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sponsor_sponsorship');
    }
}
