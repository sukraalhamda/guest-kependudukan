<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peristiwa_kematian', function (Blueprint $table) {
            $table->id('kematian_id');
            $table->foreignId('warga_id')
                ->constrained('warga', 'warga_id') // 👈 wajib sesuai PK warga
                ->onDelete('cascade');
            $table->date('tgl_meninggal');
            $table->string('sebab');
            $table->string('lokasi');
            $table->string('no_surat')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peristiwa_kematian');
    }
};
