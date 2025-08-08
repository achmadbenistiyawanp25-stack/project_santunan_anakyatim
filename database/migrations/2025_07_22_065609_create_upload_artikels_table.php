<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('upload_artikel', function (Blueprint $table) {
            $table->id('id_artikel')->unsigned()->autoIncrement();
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->string('foto', 255)->nullable();
            $table->text('text')->nullable();
            $table->string('jenis')->nullable();         
            $table->date('tanggal')->nullable();         
            $table->bigInteger('dana_terkumpul')->nullable();
            $table->bigInteger('target_dana')->nullable();
            $table->timestamps();

            $table->foreign('id_admin')->references('id_admin')->on('tabel_admin');
        });
    }

    public function down(): void {
        Schema::dropIfExists('upload_artikel');
    }
};
