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
        Schema::create('paket_soal', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_id')->index();
            $table->string('soal');
            $table->string('jawaban_A');
            $table->string('jawaban_B');
            $table->string('jawaban_C');
            $table->string('jawaban_D');
            $table->string('jawaban_E');
            $table->string('poin_A');
            $table->string('poin_B');
            $table->string('poin_C');
            $table->string('poin_D');
            $table->string('poin_E');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_soal');
    }
};
