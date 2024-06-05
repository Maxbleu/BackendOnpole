<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();

        $this->call(MarcasTableSeeder::class);
        $this->call(CochesTableSeeder::class);
        $this->call(CircuitosTableSeeder::class);
        $this->call(PersonalAccessTokenTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EstadisticasTableSeeder::class);
        $this->call(VueltaTableSeeder::class);
        $this->call(SesionTableSeeder::class);
    }
}
