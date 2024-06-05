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
        Schema::create('estadisticias_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("number_lap_record")->default(0);
            $table->unsignedBigInteger("number_hot_laps")->default(0);
            $table->unsignedBigInteger("number_total_sesions")->default(0);
            $table->unsignedBigInteger("number_total_laps")->default(0);
            $table->unsignedBigInteger("best_position_qualified")->default(0);
            $table->unsignedBigInteger("user_id")->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estadisticias_user');
    }
};
