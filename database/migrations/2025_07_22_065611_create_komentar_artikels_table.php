<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('komentar_artikel', function (Blueprint $table) {
            $table->id('id_komentar')->unsigned()->autoIncrement();
            $table->unsignedBigInteger('id_artikel')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->date('tanggal')->nullable();
            $table->text('text')->nullable();
            $table->timestamps();

            $table->foreign('id_artikel')->references('id_artikel')->on('upload_artikel');
            $table->foreign('id_user')->references('id_user')->on('tabel_user');
        });
    }

    public function down(): void {
        Schema::dropIfExists('komentar_artikel');
    }
};
