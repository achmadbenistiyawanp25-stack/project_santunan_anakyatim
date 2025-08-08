<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('laporan_donasi', function (Blueprint $table) {
            $table->id('id_laporan')->unsigned()->autoIncrement();
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->unsignedBigInteger('id_relawan')->nullable();
            $table->decimal('total_donasi', 15, 2)->nullable();
            $table->integer('jumlah_anak')->nullable();
            $table->integer('jumlah_penyalur')->nullable();
            $table->timestamps();

            $table->foreign('id_admin')->references('id_admin')->on('tabel_admin');
            $table->foreign('id_relawan')->references('id_relawan')->on('tabel_relawan');
        });
    }

    public function down(): void {
        Schema::dropIfExists('laporan_donasi');
    }
};
