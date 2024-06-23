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
        Schema::create('m_template_set_pertanyaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('template_sets_id');
            $table->unsignedBigInteger('pertanyaan_id');
            $table->integer('jml_space');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_template_set_soals');
    }
};
