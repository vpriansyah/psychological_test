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
        Schema::create('hasil_test', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('psikotes_id')->index();
            // $table->bigInteger('status_id')->index();
            $table->bigInteger('peserta_id')->index();
            $table->integer('otp')->nullable();
            $table->integer('jumlah_poin')->nullable();
            $table->string('hasil_keputusan')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_test');
    }
};
