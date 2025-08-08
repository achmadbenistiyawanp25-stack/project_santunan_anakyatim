<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pengajuan_anak', function (Blueprint $table) {
            $table->id('id_pengaju'); // lebih modern daripada increments
            $table->unsignedBigInteger('id_user')->nullable();

            $table->string('nama_anak', 100)->nullable();
            $table->enum('status', ['anak yatim', 'anak piatu'])->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('asal_sekolah', 255)->nullable();
            $table->string('nama_pendamping', 100)->nullable();
            $table->string('no_pendamping', 20)->nullable();
            $table->string('nama_wali', 100)->nullable();
            $table->string('alamat_wali', 255)->nullable();
            $table->string('foto_kk', 255)->nullable();
            $table->string('surat_kematian', 255)->nullable();
            $table->string('nama_pengaju', 100)->nullable();
            $table->string('no_pengaju', 15)->nullable();
            $table->timestamps();

            $table->foreign('id_user')
                ->references('id_user')
                ->on('tabel_user')
                ->onDelete('set null')
                ->onUpdate('no action');
        });
    }

    public function down(): void {
        Schema::dropIfExists('pengajuan_anak');
    }
};
