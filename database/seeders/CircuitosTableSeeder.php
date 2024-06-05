<?php

namespace Database\Seeders;

use App\Models\Circuito;
use Illuminate\Database\Seeder;

class CircuitosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Circuito::truncate();

        for($iterador = 0; $iterador<count(self::$circuitos); $iterador++){

            $index = 0;
            $lenghtListaNombrePistaJuego = count(self::$circuitos[$iterador]["nombre_pista_juego"]);

            $nombresPistaJuego = array_reduce(self::$circuitos[$iterador]["nombre_pista_juego"], function($acumulado, $nombre) use(&$index, &$lenghtListaNombrePistaJuego) {
                $acumulado = $acumulado . "" . $nombre;
                $index = $index + 1;
                if($index < $lenghtListaNombrePistaJuego){
                    $acumulado = $acumulado . "" . ", ";
                }
                return $acumulado;
            });

            $circuito = new Circuito();
            $circuito->nombre = self::$circuitos[$iterador]["nombre"];
            $circuito->nombre_pista_juego = $nombresPistaJuego;
            $circuito->pais = self::$circuitos[$iterador]["pais"];
            $circuito->save();
        }

    }

    public static $circuitos = [
        [
            "nombre" => "Barcelona GP",
            "nombre_pista_juego" => ["ks_barcelona-layout_gp"],
            "pais" => "es",
        ],
        [
            "nombre" => "Barcelona Moto",
            "nombre_pista_juego" => ["ks_barcelona-layout_moto"],
            "pais" => "es",
        ],
        [
            "nombre" => "Black Cat County",
            "nombre_pista_juego" => ["ks_black_cat_country-layout_init"],
            "pais" => "us",
        ],
        [
            "nombre" => "Black Cat County Long",
            "nombre_pista_juego" => ["ks_black_cat_country-layout_long"],
            "pais" => "us",
        ],
        [
            "nombre" => "Black Cat County Short",
            "nombre_pista_juego" => ["ks_black_cat_country-layout_short"],
            "pais" => "us",
        ],
        [
            "nombre" => "Brands Hatch GP",
            "nombre_pista_juego" => [
                "ks_brands_hatch-gp",
                "ks_brands_hatch-gp_osrw"
            ],
            "pais" => "gb",
        ],
        [
            "nombre" => "Brands Hatch Indy",
            "nombre_pista_juego" => [
                "ks_brands_hatch-indy",
                "ks_brands_hatch-indy_osrw"
            ],
            "pais" => "gb",
        ],
        [
            "nombre" => "Drag",
            "nombre_pista_juego" => [
                "ks_drag-drag200",
                "ks_drag-drag400",
                "ks_drag-drag500",
                "ks_drag-drag1000",
                "ks_drag-drag2000",
            ],
            "pais" => "gb",
        ],
        [
            "nombre" => "Drift",
            "nombre_pista_juego" => ["drift"],
            "pais" => "jp",
        ],
        [
            "nombre" => "Highlands",
            "nombre_pista_juego" => ["ks_highlands-layout_init"],
            "pais" => "gb-sct",
        ],
        [
            "nombre" => "Highlands Drift",
            "nombre_pista_juego" => ["ks_highlands-layout_drift"],
            "pais" => "gb-sct",
        ],
        [
            "nombre" => "Highlands Long",
            "nombre_pista_juego" => ["ks_highlands-layout_long"],
            "pais" => "gb-sct",
        ],
        [
            "nombre" => "Highlands Short",
            "nombre_pista_juego" => ["ks_highlands-layout_short"],
            "pais" => "gb-sct",
        ],
        [
            "nombre" => "Imola",
            "nombre_pista_juego" => ["imola"],
            "pais" => "it",
        ],
        [
            "nombre" => "Laguna Seca",
            "nombre_pista_juego" => ["ks_laguna_seca"],
            "pais" => "us",
        ],
        [
            "nombre" => "Magione",
            "nombre_pista_juego" => [
                "magione",
                "magione_osrw"
            ],
            "pais" => "it",
        ],
        [
            "nombre" => "Monza",
            "nombre_pista_juego" => ["monza"],
            "pais" => "it",
        ],
        [
            "nombre" => "Monza 1966 Full Course",
            "nombre_pista_juego" => ["ks_monza66-full"],
            "pais" => "it",
        ],
        [
            "nombre" => "Monza 1966 Junior Course",
            "nombre_pista_juego" => ["ks_monza66-junior"],
            "pais" => "it",
        ],
        [
            "nombre" => "Monza 1966 Road Course",
            "nombre_pista_juego" => ["ks_monza66-road"],
            "pais" => "it",
        ],
        [
            "nombre" => "Mugello",
            "nombre_pista_juego" => [
                "mugello",
                "mugello_osrw"
            ],
            "pais" => "it",
        ],
        [
            "nombre" => "Nurburgring Nordscheleife",
            "nombre_pista_juego" => ["ks_nordschleife-nordschleife"],
            "pais" => "de",
        ],
        [
            "nombre" => "Nurburgring Endurance",
            "nombre_pista_juego" => ["ks_nordschleife-endurance"],
            "pais" => "de",
        ],
        [
            "nombre" => "Nurburgring Endurance Cup",
            "nombre_pista_juego" => ["ks_nordschleife-endurance_cup"],
            "pais" => "de",
        ],
        [
            "nombre" => "Nurburgring Touristenfahrten",
            "nombre_pista_juego" => ["ks_nordschleife-touristenfahrten"],
            "pais" => "de",
        ],
        [
            "nombre" => "Nurburgring GP",
            "nombre_pista_juego" => [
                "ks_nurburgring-layout_gp_a",
                "ks_nurburgring-layout_gp_b"
            ],
            "pais" => "de",
        ],
        [
            "nombre" => "Nurburgring Sprint",
            "nombre_pista_juego" => [
                "ks_nurburgring-layout_sprint_a",
                "ks_nurburgring-layout_sprint_b"
            ],
            "pais" => "de",
        ],
        [
            "nombre" => "Red Bull Ring GP",
            "nombre_pista_juego" => ["ks_red_bull_ring-layout_gp"],
            "pais" => "at",
        ],
        [
            "nombre" => "Red Bull Ring National",
            "nombre_pista_juego" => ["ks_red_bull_ring-layout_national"],
            "pais" => "at",
        ],
        [
            "nombre" => "Silverstone GP",
            "nombre_pista_juego" => [
                "ks_silverstone_gp",
                "ks_silverstone_gp_osrw"
            ],
            "pais" => "gb",
        ],
        [
            "nombre" => "Silverstone Internacional",
            "nombre_pista_juego" => [
                "ks_silverstone_internacional",
                "ks_silverstone_internacional_osrw"
            ],
            "pais" => "gb",
        ],
        [
            "nombre" => "Silverstone National",
            "nombre_pista_juego" => [
                "ks_silverstone_national",
                "ks_silverstone_national_osrw"
            ],
            "pais" => "gb",
        ],
        [
            "nombre" => "Silverstone 1967",
            "nombre_pista_juego" => ["ks_silverstone1967"],
            "pais" => "gb",
        ],
        [
            "nombre" => "Spa",
            "nombre_pista_juego" => ["spa"],
            "pais" => "be",
        ],
        [
            "nombre" => "Trento Bondone",
            "nombre_pista_juego" => ["trento-bondone"],
            "pais" => "it",
        ],
        [
            "nombre" => "Vallelunga",
            "nombre_pista_juego" => ["ks_vallelunga-extended_circuit"],
            "pais" => "it",
        ],
        [
            "nombre" => "Vallelunga Classic",
            "nombre_pista_juego" => ["ks_vallelunga-classic_circuit"],
            "pais" => "it",
        ],
        [
            "nombre" => "Vallelunga Club",
            "nombre_pista_juego" => ["ks_vallelunga-club_circuit"],
            "pais" => "it",
        ],
        [
            "nombre" => "Zandvoort",
            "nombre_pista_juego" => ["ks_zandvoort"],
            "pais" => "nl",
        ]
    ];

}
