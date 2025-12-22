<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peristiwa_kelahiran', function (Blueprint $table) {
            $table->id('kelahiran_id');

            $table->unsignedBigInteger('warga_id');
            $table->foreign('warga_id')->references('warga_id')->on('warga')->onDelete('cascade');

            $table->date('tgl_lahir');
            $table->string('tempat_lahir');

            $table->unsignedBigInteger('ayah_warga_id')->nullable();
            $table->foreign('ayah_warga_id')->references('warga_id')->on('warga')->onDelete('cascade');

            $table->unsignedBigInteger('ibu_warga_id')->nullable();
            $table->foreign('ibu_warga_id')->references('warga_id')->on('warga')->onDelete('cascade');

            $table->string('no_akta')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peristiwa_kelahiran');
    }
};
