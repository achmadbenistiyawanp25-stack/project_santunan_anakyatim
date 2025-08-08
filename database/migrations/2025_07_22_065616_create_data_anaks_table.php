<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('data_anak', function (Blueprint $table) {
            $table->id('id_anak')->unsigned()->autoIncrement();

            $table->unsignedBigInteger('id_admin')->nullable();
            $table->unsignedBigInteger('id_relawan')->nullable();
            $table->unsignedBigInteger('id_pengaju')->nullable(); 

            $table->string('nama_lengkap', 100)->nullable();
            $table->string('tempat_tanggallahir', 100)->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('asal_sekolah', 255)->nullable();
            $table->string('nama_pendamping', 100)->nullable();
            $table->string('nama_wali', 100)->nullable();
            $table->string('foto_kk', 255)->nullable();
            $table->string('surat_kematian', 255)->nullable();
            $table->enum('status', ['anak yatim', 'anak piatu'])->nullable();
            $table->string('nama_pengaju', 100)->nullable();
            $table->string('no_pengaju', 15)->nullable();
            $table->string('no_rekening', 20)->nullable();
            $table->string('alamat_wali', 255)->nullable();
            $table->string('no_pendamping', 15)->nullable();
            $table->timestamps();

            $table->foreign('id_admin')->references('id_admin')->on('tabel_admin')->nullOnDelete();
            $table->foreign('id_relawan')->references('id_relawan')->on('tabel_relawan')->nullOnDelete();
            $table->foreign('id_pengaju')->references('id_pengaju')->on('pengajuan_anak')->nullOnDelete();
        });
    }

    public function down(): void {
        Schema::dropIfExists('data_anak');
    }
};
