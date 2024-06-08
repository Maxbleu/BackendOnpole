<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        User::create([
            'name' => 'admin',
            'email' => @env("ADMIN_EMAIL"),
            'password' => @env("ADMIN_PASSWORD"),
            'acronimo' => "adm",
            "pais" => "es"
        ]);

        User::create([
            'name' => 'gemma',
            'email' => "gemma@gmail.com",
            'password' => "gemmaOnpole",
            'acronimo' => "GEM",
            "pais" => "es"
        ]);
    }
}
