<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tabel_admin', function (Blueprint $table) {
            $table->id('id_admin');
            $table->string('username', 100)->unique();
            $table->string('password', 255);
            $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif');
            $table->dateTime('terakhir_login')->nullable();
            $table->string('foto_profil')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('tabel_admin');
    }
};
