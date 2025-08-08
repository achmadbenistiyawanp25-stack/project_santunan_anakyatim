<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rekap_penyalur', function (Blueprint $table) {
            $table->id('id_penyalur');

            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_relawan');
            $table->unsignedBigInteger('id_user');

            $table->date('tanggal');
            $table->string('nama_anak', 100);

            $table->decimal('nominal', 20, 6);
            $table->decimal('donasi_masuk', 20, 6);
            $table->decimal('donasi_keluar', 20, 6);

            $table->string('nama_penyalur', 100);
            $table->string('no_rekening', 30);
            $table->string('bukti_tasaruf', 255);
            $table->enum('status', ['berhasil', 'gagal']);
            $table->timestamps();

            $table->foreign('id_admin')
                  ->references('id_admin')->on('tabel_admin')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('id_relawan')
                  ->references('id_relawan')->on('tabel_relawan')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('id_user')
                  ->references('id_user')->on('tabel_user')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rekap_penyalur');
    }
};
