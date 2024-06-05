<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;

class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Marca::truncate();

        for($iterador = 0; $iterador < count(self::$marcas); $iterador++){
            $marca = new Marca();
            $marca->nombre = self::$marcas[$iterador]["nombre"];
            $marca->pais = self::$marcas[$iterador]["pais"];
            $marca->totalCoches = self::$marcas[$iterador]["totalCoches"];
            $marca->save();
        }

    }

    private static $marcas = [
        [
            "nombre" => "Abarth",
            "pais" => "it",
            "totalCoches" => 6
        ],
        [
            "nombre" => "Alfa Romeo",
            "pais" => "it",
            "totalCoches" => 8
        ],
        [
            "nombre" => "Audi",
            "pais" => "de",
            "totalCoches" => 10
        ],
        [
            "nombre" => "BMW",
            "pais" => "de",
            "totalCoches" => 18
        ],
        [
            "nombre" => "Chevrolet",
            "pais" => "us",
            "totalCoches" => 2
        ],
        [
            "nombre" => "Ferrari",
            "pais" => "it",
            "totalCoches" => 20
        ],
        [
            "nombre" => "Ford",
            "pais" => "us",
            "totalCoches" => 2
        ],
        [
            "nombre" => "KTM",
            "pais" => "at",
            "totalCoches" => 1
        ],
        [
            "nombre" => "Lamborghini",
            "pais" => "it",
            "totalCoches" => 10
        ],
        [
            "nombre" => "Lotus",
            "pais" => "gb",
            "totalCoches" => 24
        ],
        [
            "nombre" => "Maserati",
            "pais" => "it",
            "totalCoches" => 7
        ],
        [
            "nombre" => "Mazda",
            "pais" => "jp",
            "totalCoches" => 6
        ],
        [
            "nombre" => "Mclaren",
            "pais" => "gb",
            "totalCoches" => 7
        ],
        [
            "nombre" => "Mercedes",
            "pais" => "de",
            "totalCoches" => 5
        ],
        [
            "nombre" => "Nissan",
            "pais" => "jp",
            "totalCoches" => 4
        ],
        [
            "nombre" => "Pagani",
            "pais" => "it",
            "totalCoches" => 3
        ],
        [
            "nombre" => "Porsche",
            "pais" => "de",
            "totalCoches" => 27
        ],
        [
            "nombre" => "Praga",
            "pais" => "cz",
            "totalCoches" => 1
        ],
        [
            "nombre" => "RUF",
            "pais" => "de",
            "totalCoches" => 3
        ],
        [
            "nombre" => "Scuderia Glickenhaus",
            "pais" => "it",
            "totalCoches" => 2
        ],
        [
            "nombre" => "Shelby",
            "pais" => "us",
            "totalCoches" => 1
        ],
        [
            "nombre" => "Tatuus",
            "pais" => "it",
            "totalCoches" => 1
        ],
        [
            "nombre" => "Toyota",
            "pais" => "jp",
            "totalCoches" => 9
        ]
    ];

}
