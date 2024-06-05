<?php

namespace Database\Seeders;

use App\Models\Estadistica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadisticasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estadistica::truncate();

        Estadistica::create([
            'number_lap_record' => 0,
            'number_hot_laps' => 0,
            'number_total_sesions' => 0,
            'number_total_laps' => 0,
            'user_id' => 1
        ]);
    }
}
