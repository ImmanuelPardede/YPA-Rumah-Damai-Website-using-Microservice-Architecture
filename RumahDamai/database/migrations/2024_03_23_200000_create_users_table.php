<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status')->default('aktif');
            $table->boolean('role')->default(false); //add type boolean Users: 0=>User, 1=>Admin, 2=>Manager
            $table->string('nip')->nullable();
            $table->unsignedBigInteger('golongan_darah_id')->nullable();
            $table->unsignedBigInteger('jenis_kelamin_id')->nullable();
            $table->unsignedBigInteger('agama_id')->nullable();
            $table->unsignedBigInteger('pendidikan_id')->nullable();
            $table->string('alamat')->nullable();

            $table->string('no_telepon', 12)->nullable();
            $table->string('lulusan')->nullable();
            $table->string('pengalaman', 2000)->nullable();


            $table->timestamp('tanggal_masuk')->useCurrent();
            $table->timestamp('tanggal_keluar')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->unsignedBigInteger('lokasi_penugasan_id')->nullable();
            $table->string('foto')->nullable();
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('agama_id')->references('id')->on('agama');
            $table->foreign('jenis_kelamin_id')->references('id')->on('jenis_kelamin');
            $table->foreign('pendidikan_id')->references('id')->on('pendidikan');
            $table->foreign('golongan_darah_id')->references('id')->on('golongan_darah');
            $table->foreign('lokasi_penugasan_id')->references('id')->on('lokasi_penugasan');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
