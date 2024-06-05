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
        Schema::create('vueltas', function (Blueprint $table) {
            $table->id();
            $table->integer("sector_1");
            $table->integer("sector_2");
            $table->integer("sector_3");
            $table->unsignedBigInteger("track_limits");
            $table->unsignedBigInteger("numero_vuelta_sesion");
            $table->integer("tiempo_vuelta");
            $table->unsignedBigInteger("coche_id");
            $table->unsignedBigInteger("circuito_id");
            $table->unsignedBigInteger("sesion_id");
            $table->unsignedBigInteger("user_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vueltas');
    }
};
