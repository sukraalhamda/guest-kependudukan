<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('media_id');         // Primary Key
            $table->string('ref_table');               // Nama tabel referensi
            $table->unsignedBigInteger('ref_id');      // ID referensi
            $table->string('file_name');               // Lokasi file
            $table->string('caption')->nullable();     // Caption optional
            $table->string('mime_type')->nullable();   // Mime type optional
            $table->integer('sort_order')->default(0); // Urutan
            $table->timestamps();

            // Index untuk mempercepat query berdasarkan ref_table dan ref_id
            $table->index(['ref_table', 'ref_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
}
