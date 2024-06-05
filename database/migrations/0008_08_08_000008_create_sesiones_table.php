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
        Schema::create('sesiones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("circuito_id");
            $table->unsignedBigInteger("coche_id");
            $table->unsignedBigInteger("numero_mejor_vuelta");
            $table->unsignedBigInteger("user_id");
            $table->string("tipo_sesion");
            $table->string("fecha");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesiones');
    }
};
