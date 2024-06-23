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
        Schema::create('m_jawabans', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('jawaban');
            $table->string('keterangan');
            $table->string('kode_usah');
            $table->string('jenis_jawaban');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_jawabans');
    }
};
