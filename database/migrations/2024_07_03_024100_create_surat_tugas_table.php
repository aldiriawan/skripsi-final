<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor')->nullable();
            $table->foreignId('dosen_id')->nullable();
            $table->date('tanggal')->nullable();
            $table->longText('keterangan')->nullable();
            $table->date('waktu_awal')->nullable();
            $table->date('waktu_akhir')->nullable();
            $table->foreignId('bukti_id')->nullable();
            $table->foreignId('jenis_id')->nullable();
            $table->foreignId('akreditasi_id')->nullable();
            $table->foreignId('kategori_id')->nullable();
            $table->foreignId('peran_id')->nullable();
            $table->foreignId('publikasi_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_tugas');
    }
};
