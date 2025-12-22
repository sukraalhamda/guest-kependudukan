<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peristiwa_pindah', function (Blueprint $table) {
            $table->id('pindah_id');

            // Kolom relasi
            $table->unsignedBigInteger('warga_id');

            // Kolom dari kodingan pertama
            $table->date('tgl_pindah');
            $table->string('alamat_tujuan');
            $table->string('alasan')->nullable();
            $table->string('no_surat')->nullable();

            // Kolom tambahan dari kodingan kedua
            $table->string('kecamatan_tujuan', 100)->nullable();
            $table->string('kabupaten_tujuan', 100)->nullable();
            $table->string('provinsi_tujuan', 100)->nullable();
            $table->string('negara_tujuan', 100)->default('Indonesia');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            $table->timestamps();

            // Foreign key
            $table->foreign('warga_id')
                ->references('warga_id')
                ->on('warga')
                ->onDelete('cascade');

            // Index tambahan
            $table->index('warga_id');
            $table->index('tgl_pindah');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peristiwa_pindah');
    }
};
