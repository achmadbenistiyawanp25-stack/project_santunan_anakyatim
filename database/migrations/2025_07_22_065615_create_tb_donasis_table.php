<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tb_donasi', function (Blueprint $table) {
            $table->id('id_donasi')->unsigned()->autoIncrement();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('nama_donasi', 100)->nullable();
            $table->date('tanggal')->nullable();
            $table->decimal('nominal', 12, 2)->nullable();
            $table->enum('metode', ['Y', 'N'])->nullable();
            $table->enum('jenis_donasi', ['anak yatim', 'anak piatu'])->nullable();
            $table->enum('status', ['berhasil', 'gagal'])->nullable();
            $table->text('pesan')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('tabel_user');
        });
    }

    public function down(): void {
        Schema::dropIfExists('tb_donasi');
    }
};
