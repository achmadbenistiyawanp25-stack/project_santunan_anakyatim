<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('dokumentasi', function (Blueprint $table) {
            $table->id('id_dokumentasi')->unsigned()->autoIncrement();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->unsignedBigInteger('id_relawan')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('tempat', 255)->nullable();
            $table->decimal('nominal', 20, 6)->nullable();
            $table->string('upload_foto', 255)->nullable();
            $table->string('keterangan', 255)->nullable();
            $table->enum('jenis_dokumentasi', ['dokumentasi umum', 'dokumentasi urgensi'])->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('tabel_user');
            $table->foreign('id_admin')->references('id_admin')->on('tabel_admin');
            $table->foreign('id_relawan')->references('id_relawan')->on('tabel_relawan');
        });
    }

    public function down(): void {
        Schema::dropIfExists('dokumentasi');
    }
};
