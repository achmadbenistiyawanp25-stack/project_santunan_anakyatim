<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration {
    public function up(): void {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id('id_notifikasi');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('judul', 255)->nullable();
            $table->text('isi')->nullable();
            $table->enum('status', ['terbaca', 'belum terbaca'])->default('belum terbaca');
            $table->timestamp('waktu')->useCurrent();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('tabel_user')->onDelete('set null');
        });
    }

    public function down(): void {
        Schema::dropIfExists('notifikasi');
    }
};
