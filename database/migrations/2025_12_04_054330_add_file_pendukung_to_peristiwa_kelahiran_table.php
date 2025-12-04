<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('peristiwa_kelahiran', function (Blueprint $table) {
            $table->string('file_pendukung')->nullable()->after('no_akta');
        });
    }

    public function down()
    {
        Schema::table('peristiwa_kelahiran', function (Blueprint $table) {
            $table->dropColumn('file_pendukung');
        });
    }

};
