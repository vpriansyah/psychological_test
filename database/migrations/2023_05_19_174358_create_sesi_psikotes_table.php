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
        Schema::create('sesi_psikotes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('paket_soal_id')->unique();
            $table->bigInteger('peserta_id')->unique();
            $table->dateTime('waktu_pengerjaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesi_psikotes');
    }
};
