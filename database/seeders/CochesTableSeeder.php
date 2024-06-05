<?php

namespace Database\Seeders;

use App\Models\Coche;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CochesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coche::truncate();

        for($iterador = 0; $iterador<count(self::$coches); $iterador++){
            $coche = new Coche();
            $coche->nombre = self::$coches[$iterador]["nombre"];
            $coche->nombreCocheJuego = self::$coches[$iterador]["nombreCocheJuego"];
            $coche->categoria = self::$coches[$iterador]["categoria"];
            $coche->marca_id = self::$coches[$iterador]["marca_id"];
            $coche->save();
        }

    }

    public static $coches = [
        [
            "nombre" => "500 ASSETTO CORSE",
            "nombreCocheJuego" => "ks_abarth500_assetto_corse",
            "categoria" => "rccr",
            "marca_id" => 1
        ],
        [
            "nombre" => "500 S1",
            "nombreCocheJuego" => "abarth500_s1",
            "categoria" => "strt",
            "marca_id" => 1
        ],
        [
            "nombre" => "500 ESSEESSE",
            "nombreCocheJuego" => "abarth500",
            "categoria" => "strt",
            "marca_id" => 1
        ],
        [
            "nombre" => "FIAT 595 SS",
            "nombreCocheJuego" => "ks_abarth_595ss",
            "categoria" => "clsc",
            "marca_id" => 1
        ],
        [
            "nombre" => "595 S1",
            "nombreCocheJuego" => "ks_abarth_595ss_s1",
            "categoria" => "clsc",
            "marca_id" => 1
        ],
        [
            "nombre" => "595 S2",
            "nombreCocheJuego" => "ks_abarth_595ss_s2",
            "categoria" => "clsc",
            "marca_id" => 1
        ],

        [
            "nombre" => "155TI V6 93",
            "nombreCocheJuego" => "ks_alfa_romeo_155_v6",
            "categoria" => "rccr",
            "marca_id" => 2
        ],
        [
            "nombre" => "33 STRADALE",
            "nombreCocheJuego" => "ks_alfa_33_stradale",
            "categoria" => "clsc",
            "marca_id" => 2
        ],
        [
            "nombre" => "GTA",
            "nombreCocheJuego" => "ks_alfa_romeo_gta",
            "categoria" => "clsc",
            "marca_id" => 2
        ],
        [
            "nombre" => "4C",
            "nombreCocheJuego" => "ks_alfa_romeo_4c",
            "categoria" => "sptc",
            "marca_id" => 2
        ],
        [
            "nombre" => "GIULIA QV",
            "nombreCocheJuego" => "ks_alfa_giulia_qv",
            "categoria" => "sptc",
            "marca_id" => 2
        ],
        [
            "nombre" => "GIULIETTA QV LAUNCH EDITION",
            "nombreCocheJuego" => "alfa_romeo_giulietta_qv_le",
            "categoria" => "strt",
            "marca_id" => 2
        ],
        [
            "nombre" => "GIULIETTA QV",
            "nombreCocheJuego" => "alfa_romeo_giulietta_qv",
            "categoria" => "strt",
            "marca_id" => 2
        ],
        [
            "nombre" => "MITO QV",
            "nombreCocheJuego" => "ks_alfa_mito_qv",
            "categoria" => "strt",
            "marca_id" => 2
        ],

        [
            "nombre" => "R18 E-TRON QUATTRO 2014",
            "nombreCocheJuego" => "ks_audi_r18_etron_quattro",
            "categoria" => "rccr",
            "marca_id" => 3
        ],
        [
            "nombre" => "SPORT QUATTRO S1 E2",
            "nombreCocheJuego" => "ks_audi_sport_quattro_rally",
            "categoria" => "rlly",
            "marca_id" => 3
        ],
        [
            "nombre" => "R8 LMS 2016",
            "nombreCocheJuego" => "ks_audi_r8_lms_2016",
            "categoria" => "rccr",
            "marca_id" => 3
        ],
        [
            "nombre" => "R8 LMS ULTRA",
            "nombreCocheJuego" => "ks_audi_r8_lms",
            "categoria" => "rccr",
            "marca_id" => 3
        ],
        [
            "nombre" => "TT CUP",
            "nombreCocheJuego" => "ks_audi_tt_cup",
            "categoria" => "rccr",
            "marca_id" => 3
        ],
        [
            "nombre" => "TT RS (VLN)",
            "nombreCocheJuego" => "ks_audi_tt_vln",
            "categoria" => "rccr",
            "marca_id" => 3
        ],
        [
            "nombre" => "R8 V10 PLUS",
            "nombreCocheJuego" => "ks_audi_r8_plus",
            "categoria" => "sptc",
            "marca_id" => 3
        ],
        [
            "nombre" => "SPORT QUATTRO S1",
            "nombreCocheJuego" => "ks_audi_sport_quattro_s1",
            "categoria" => "rlly",
            "marca_id" => 3
        ],
        [
            "nombre" => "SPORT QUATTRO",
            "nombreCocheJuego" => "ks_audi_sport_quattro",
            "categoria" => "rlly",
            "marca_id" => 3
        ],
        [
            "nombre" => "S1",
            "nombreCocheJuego" => "ks_audi_a1s1",
            "categoria" => "strt",
            "marca_id" => 3
        ],

        [
            "nombre" => "1M",
            "nombreCocheJuego" => "bmw_1m",
            "categoria" => "sptc",
            "marca_id" => 4
        ],
        [
            "nombre" => "1M S3",
            "nombreCocheJuego" => "bmw_1m_s3",
            "categoria" => "sptc",
            "marca_id" => 4
        ],
        [
            "nombre" => "M235I RACE CAR",
            "nombreCocheJuego" => "ks_bmw_m235i_racing",
            "categoria" => "rccr",
            "marca_id" => 4
        ],
        [
            "nombre" => "M3 E30",
            "nombreCocheJuego" => "bmw_m3_e30",
            "categoria" => "strt",
            "marca_id" => 4
        ],
        [
            "nombre" => "M3 E30 DRIFT",
            "nombreCocheJuego" => "bmw_m3_e30_drift",
            "categoria" => "drft",
            "marca_id" => 4
        ],
        [
            "nombre" => "M3 E30 GROUP A",
            "nombreCocheJuego" => "bmw_m3_e30_gra",
            "categoria" => "rccr",
            "marca_id" => 4
        ],
        [
            "nombre" => "M3 E30 S1",
            "nombreCocheJuego" => "bmw_m3_e30_s1",
            "categoria" => "strt",
            "marca_id" => 4
        ],
        [
            "nombre" => "M3 E30 GROUP A 92",
            "nombreCocheJuego" => "bmw_m3_e30_dtm",
            "categoria" => "rccr",
            "marca_id" => 4
        ],
        [
            "nombre" => "M3 E92",
            "nombreCocheJuego" => "bmw_m3_e92",
            "categoria" => "sptc",
            "marca_id" => 4
        ],
        [
            "nombre" => "M3 E92 DRIFT",
            "nombreCocheJuego" => "bmw_m3_e92_drift",
            "categoria" => "drft",
            "marca_id" => 4
        ],
        [
            "nombre" => "M3 E92 S1",
            "nombreCocheJuego" => "bmw_m3_e92_s1",
            "categoria" => "sptc",
            "marca_id" => 4
        ],
        [
            "nombre" => "M3 GT2",
            "nombreCocheJuego" => "bmw_m3_gt2",
            "categoria" => "rccr",
            "marca_id" => 4
        ],
        [
            "nombre" => "M4 COUPE",
            "nombreCocheJuego" => "ks_bmw_m4",
            "categoria" => "sptc",
            "marca_id" => 4
        ],
        [
            "nombre" => "M4 COUPE AKRAPOVIC EDITION",
            "nombreCocheJuego" => "ks_bmw_m4_akrapovic",
            "categoria" => "sptc",
            "marca_id" => 4
        ],
        [
            "nombre" => "Z4 E89 35IS DRIFT",
            "nombreCocheJuego" => "bmw_z4_drift",
            "categoria" => "drft",
            "marca_id" => 4
        ],
        [
            "nombre" => "Z4 E89 35IS",
            "nombreCocheJuego" => "bmw_z4",
            "categoria" => "sptc",
            "marca_id" => 4
        ],
        [
            "nombre" => "Z4 GT3",
            "nombreCocheJuego" => "bmw_z4_gt3",
            "categoria" => "rccr",
            "marca_id" => 4
        ],
        [
            "nombre" => "Z4 E89 35IS S1",
            "nombreCocheJuego" => "bmw_z4_s1",
            "categoria" => "sptc",
            "marca_id" => 4
        ],

        [
            "nombre" => "CORVETTE C7R GTE",
            "nombreCocheJuego" => "ks_corvette_c7r",
            "categoria" => "rccr",
            "marca_id" => 5
        ],
        [
            "nombre" => "CORVETTE C7 STINGRAY",
            "nombreCocheJuego" => "ks_corvette_c7_stingray",
            "categoria" => "sptc",
            "marca_id" => 5
        ],

        [
            "nombre" => "SF70H",
            "nombreCocheJuego" => "ks_ferrari_sf70h",
            "categoria" => "opwh",
            "marca_id" => 6
        ],
        [
            "nombre" => "F12004",
            "nombreCocheJuego" => "ks_ferrari_f2004",
            "categoria" => "opwh",
            "marca_id" => 6
        ],
        [
            "nombre" => "F138",
            "nombreCocheJuego" => "ks_ferrari_f138",
            "categoria" => "opwh",
            "marca_id" => 6
        ],
        [
            "nombre" => "SF15-T",
            "nombreCocheJuego" => "ks_ferrari_sf15t",
            "categoria" => "opwh",
            "marca_id" => 6
        ],
        [
            "nombre" => "F312T 1975",
            "nombreCocheJuego" => "ferrari_312t",
            "categoria" => "opwh",
            "marca_id" => 6
        ],
        [
            "nombre" => "312/67",
            "nombreCocheJuego" => "ks_ferrari_312_67",
            "categoria" => "opwh",
            "marca_id" => 6
        ],
        [
            "nombre" => "F40",
            "nombreCocheJuego" => "ferrari_f40",
            "categoria" => "spcl",
            "marca_id" => 6
        ],
        [
            "nombre" => "F40 S3",
            "nombreCocheJuego" => "ferrari_f40_s3",
            "categoria" => "spcl",
            "marca_id" => 6
        ],
        [
            "nombre" => "FXX K",
            "nombreCocheJuego" => "ks_ferrari_fxx_k",
            "categoria" => "sptc",
            "marca_id" => 6
        ],
        [
            "nombre" => "LAFERRARI",
            "nombreCocheJuego" => "ferrari_laferrari",
            "categoria" => "sptc",
            "marca_id" => 6
        ],
        [
            "nombre" => "599XX EVO",
            "nombreCocheJuego" => "ferrari_599xxevo",
            "categoria" => "sptc",
            "marca_id" => 6
        ],
        [
            "nombre" => "812 SUPERFAST",
            "nombreCocheJuego" => "ks_ferrari_812_superfast",
            "categoria" => "sptc",
            "marca_id" => 6
        ],
        [
            "nombre" => "458 ITALIA",
            "nombreCocheJuego" => "ferrari_458",
            "categoria" => "sptc",
            "marca_id" => 6
        ],
        [
            "nombre" => "458 GT2",
            "nombreCocheJuego" => "ferrari_458_gt2",
            "categoria" => "rccr",
            "marca_id" => 6
        ],
        [
            "nombre" => "FERRARI 458 ITALIA S3",
            "nombreCocheJuego" => "ferrari_458_s3",
            "categoria" => "sptc",
            "marca_id" => 6
        ],
        [
            "nombre" => "488 GTB",
            "nombreCocheJuego" => "ks_ferrari_488_gtb",
            "categoria" => "sptc",
            "marca_id" => 6
        ],
        [
            "nombre" => "488 GT3",
            "nombreCocheJuego" => "ks_ferrari_488_gt3",
            "categoria" => "rccr",
            "marca_id" => 6
        ],
        [
            "nombre" => "GTO",
            "nombreCocheJuego" => "ks_ferrari_288_gto",
            "categoria" => "spcl",
            "marca_id" => 6
        ],
        [
            "nombre" => "330 P4",
            "nombreCocheJuego" => "ks_ferrari_330_p4",
            "categoria" => "spcl",
            "marca_id" => 6
        ],
        [
            "nombre" => "250 GTO",
            "nombreCocheJuego" => "ks_ferrari_250_gto",
            "categoria" => "spcl",
            "marca_id" => 6
        ],

        [
            "nombre" => "GT40",
            "nombreCocheJuego" => "ks_ford_gt40",
            "categoria" => "spcl",
            "marca_id" => 7
        ],
        [
            "nombre" => "MUSTANG 2015",
            "nombreCocheJuego" => "ks_ford_mustang_2015",
            "categoria" => "sptc",
            "marca_id" => 7
        ],
        [
            "nombre" => "ESCORT RS1600",
            "nombreCocheJuego" => "ks_ford_escort_mk1",
            "categoria" => "clsc",
            "marca_id" => 7
        ],

        [
            "nombre" => "X-BOW R",
            "nombreCocheJuego" => "ktm_xbow_r",
            "categoria" => "rccr",
            "marca_id" => 8
        ],

        [
            "nombre" => "SESTO ELEMENTO",
            "nombreCocheJuego" => "ks_lamborghini_sesto_elemento",
            "categoria" => "sptc",
            "marca_id" => 9
        ],
        [
            "nombre" => "HURACAN PERFORMANTE",
            "nombreCocheJuego" => "ks_lamborghini_huracan_performante",
            "categoria" => "sptc",
            "marca_id" => 9
        ],
        [
            "nombre" => "HURACAN GT3",
            "nombreCocheJuego" => "ks_lamborghini_huracan_gt3",
            "categoria" => "rccr",
            "marca_id" => 9
        ],
        [
            "nombre" => "HURACAN SUPER TROFEO",
            "nombreCocheJuego" => "ks_lamborghini_huracan_st",
            "categoria" => "rccr",
            "marca_id" => 9
        ],
        [
            "nombre" => "AVENTADOR SUPER VELOCE",
            "nombreCocheJuego" => "ks_lamborghini_aventador_sv",
            "categoria" => "sptc",
            "marca_id" => 9
        ],
        [
            "nombre" => "GALLARDO SL S3",
            "nombreCocheJuego" => "ks_lamborghini_gallardo_sl_s3",
            "categoria" => "sptc",
            "marca_id" => 9
        ],
        [
            "nombre" => "GALLARDO SL",
            "nombreCocheJuego" => "ks_lamborghini_gallardo_sl",
            "categoria" => "sptc",
            "marca_id" => 9
        ],
        [
            "nombre" => "COUNTACH",
            "nombreCocheJuego" => "ks_lamborghini_countach",
            "categoria" => "spcl",
            "marca_id" => 9
        ],
        [
            "nombre" => "COUNTACH S1",
            "nombreCocheJuego" => "ks_lamborghini_countach_s1",
            "categoria" => "spcl",
            "marca_id" => 9
        ],
        [
            "nombre" => "MIURA",
            "nombreCocheJuego" => "ks_lamborghini_miura_sv",
            "categoria" => "clsc",
            "marca_id" => 9
        ],

        [
            "nombre" => "EXOS T125 S1",
            "nombreCocheJuego" => "lotus_exos_125_s1",
            "categoria" => "opwh",
            "marca_id" => 10
        ],
        [
            "nombre" => "EXOS T125",
            "nombreCocheJuego" => "lotus_exos_125",
            "categoria" => "opwh",
            "marca_id" => 10
        ],
        [
            "nombre" => "TYPE 98T",
            "nombreCocheJuego" => "lotus_98t",
            "categoria" => "opwh",
            "marca_id" => 10
        ],
        [
            "nombre" => "TYPE 72D",
            "nombreCocheJuego" => "ks_lotus_72d",
            "categoria" => "opwh",
            "marca_id" => 10
        ],
        [
            "nombre" => "TYPE 49",
            "nombreCocheJuego" => "lotus_49",
            "categoria" => "opwh",
            "marca_id" => 10
        ],
        [
            "nombre" => "TYPE 25",
            "nombreCocheJuego" => "ks_lotus_25",
            "categoria" => "opwh",
            "marca_id" => 10
        ],
        [
            "nombre" => "EVORA GTC",
            "nombreCocheJuego" => "lotus_evora_gtc",
            "categoria" => "rccr",
            "marca_id" => 10
        ],
        [
            "nombre" => "EVORA GX",
            "nombreCocheJuego" => "lotus_evora_gx",
            "categoria" => "rccr",
            "marca_id" => 10
        ],
        [
            "nombre" => "2 ELEVEN",
            "nombreCocheJuego" => "lotus_2_eleven",
            "categoria" => "sptc",
            "marca_id" => 10
        ],
        [
            "nombre" => "EVORA GTE",
            "nombreCocheJuego" => "lotus_evora_gte",
            "categoria" => "sptc",
            "marca_id" => 10
        ],
        [
            "nombre" => "EVORA GTE CARBON",
            "nombreCocheJuego" => "lotus_evora_gte_carbon",
            "categoria" => "sptc",
            "marca_id" => 10
        ],
        [
            "nombre" => "2 ELEVEN GT4",
            "nombreCocheJuego" => "lotus_2_eleven_gt4",
            "categoria" => "rccr",
            "marca_id" => 10
        ],
        [
            "nombre" => "3 ELEVEN",
            "nombreCocheJuego" => "ks_lotus_3_eleven",
            "categoria" => "rccr",
            "marca_id" => 10
        ],
        [
            "nombre" => "ELISE SC",
            "nombreCocheJuego" => "lotus_elise_sc",
            "categoria" => "sptc",
            "marca_id" => 10
        ],
        [
            "nombre" => "EVORA S",
            "nombreCocheJuego" => "lotus_evora_s",
            "categoria" => "sptc",
            "marca_id" => 10
        ],
        [
            "nombre" => "EXIGE 240R S3",
            "nombreCocheJuego" => "lotus_exige_240_s3",
            "categoria" => "sptc",
            "marca_id" => 10
        ],
        [
            "nombre" => "EXIGE 240R",
            "nombreCocheJuego" => "lotus_exige_240",
            "categoria" => "sptc",
            "marca_id" => 10
        ],
        [
            "nombre" => "EXIGE S ROADSTER",
            "nombreCocheJuego" => "lotus_exige_s_roadster",
            "categoria" => "sptc",
            "marca_id" => 10
        ],
        [
            "nombre" => "EXIGE S",
            "nombreCocheJuego" => "lotus_exige_s",
            "categoria" => "sptc",
            "marca_id" => 10
        ],
        [
            "nombre" => "EXIGE SCURA",
            "nombreCocheJuego" => "lotus_exige_scura",
            "categoria" => "sptc",
            "marca_id" => 10
        ],
        [
            "nombre" => "EXIGE V6 CUP",
            "nombreCocheJuego" => "lotus_exige_v6_cup",
            "categoria" => "sptc",
            "marca_id" => 10
        ],
        [
            "nombre" => "ELISE S1",
            "nombreCocheJuego" => "lotus_elise_sc_s1",
            "categoria" => "sptc",
            "marca_id" => 10
        ],
        [
            "nombre" => "ELISE S2",
            "nombreCocheJuego" => "lotus_elise_sc_s2",
            "categoria" => "sptc",
            "marca_id" => 10
        ],
        [
            "nombre" => "ELISE SR",
            "nombreCocheJuego" => "lotus_elise_sc",
            "categoria" => "sptc",
            "marca_id" => 10
        ],

        [
            "nombre" => "MC12 GT1",
            "nombreCocheJuego" => "ks_maserati_mc12_gt1",
            "categoria" => "rccr",
            "marca_id" => 11
        ],
        [
            "nombre" => "GRANTURISMO MC GT4",
            "nombreCocheJuego" => "ks_maserati_gt_mc_gt4",
            "categoria" => "rccr",
            "marca_id" => 11
        ],
        [
            "nombre" => "250F 6C",
            "nombreCocheJuego" => "ks_maserati_250f_6cyl",
            "categoria" => "opwh",
            "marca_id" => 11
        ],
        [
            "nombre" => "250F T2 12C",
            "nombreCocheJuego" => "ks_maserati_250f_12cyl",
            "categoria" => "opwh",
            "marca_id" => 11
        ],
        [
            "nombre" => "ALFIERI",
            "nombreCocheJuego" => "ks_maserati_alfieri",
            "categoria" => "sptc",
            "marca_id" => 11
        ],
        [
            "nombre" => "QUATTROPORTE",
            "nombreCocheJuego" => "ks_maserati_quattroporte",
            "categoria" => "sptc",
            "marca_id" => 11
        ],
        [
            "nombre" => "LEVANTE S",
            "nombreCocheJuego" => "ks_maserati_levante",
            "categoria" => "strt",
            "marca_id" => 11
        ],

        [
            "nombre" => "787B",
            "nombreCocheJuego" => "ks_mazda_787b",
            "categoria" => "spcl",
            "marca_id" => 12
        ],
        [
            "nombre" => "RX-7 TUNED",
            "nombreCocheJuego" => "ks_mazda_rx7_tuned",
            "categoria" => "sptc",
            "marca_id" => 12
        ],
        [
            "nombre" => "RX 7 SPIRIT R",
            "nombreCocheJuego" => "ks_mazda_rx7_spirit_r",
            "categoria" => "sptc",
            "marca_id" => 12
        ],
        [
            "nombre" => "MX5 CUP",
            "nombreCocheJuego" => "ks_mazda_mx5_cup",
            "categoria" => "rccr",
            "marca_id" => 12
        ],
        [
            "nombre" => "MX5 ND",
            "nombreCocheJuego" => "ks_mazda_mx5_nd",
            "categoria" => "strt",
            "marca_id" => 12
        ],
        [
            "nombre" => "MIATA",
            "nombreCocheJuego" => "ks_mazda_miata",
            "categoria" => "strt",
            "marca_id" => 12
        ],

        [
            "nombre" => "F1 GTR",
            "nombreCocheJuego" => "ks_mclaren_f1_gtr",
            "categoria" => "spcl",
            "marca_id" => 13
        ],
        [
            "nombre" => "P1 GTR",
            "nombreCocheJuego" => "ks_mclaren_p1_gtr",
            "categoria" => "sptc",
            "marca_id" => 13
        ],
        [
            "nombre" => "650 GT3",
            "nombreCocheJuego" => "ks_mclaren_650_gt3",
            "categoria" => "rccr",
            "marca_id" => 13
        ],
        [
            "nombre" => "MP4 - 12C GT3",
            "nombreCocheJuego" => "mclaren_mp412c_gt3",
            "categoria" => "rccr",
            "marca_id" => 13
        ],
        [
            "nombre" => "P1",
            "nombreCocheJuego" => "ks_mclaren_p1",
            "categoria" => "sptc",
            "marca_id" => 13
        ],
        [
            "nombre" => "MP4 - 12C",
            "nombreCocheJuego" => "mclaren_mp412c",
            "categoria" => "sptc",
            "marca_id" => 13
        ],

        [
            "nombre" => "C9",
            "nombreCocheJuego" => "ks_mercedes_c9",
            "categoria" => "spcl",
            "marca_id" => 14
        ],
        [
            "nombre" => "AMG GT3",
            "nombreCocheJuego" => "ks_mercedes_amg_gt3",
            "categoria" => "rccr",
            "marca_id" => 14
        ],
        [
            "nombre" => "SLS AMG GT3",
            "nombreCocheJuego" => "mercedes_sls_gt3",
            "categoria" => "rccr",
            "marca_id" => 14
        ],
        [
            "nombre" => "190E EVO II",
            "nombreCocheJuego" => "ks_mercedes_190_evo2",
            "categoria" => "rccr",
            "marca_id" => 14
        ],
        [
            "nombre" => "SLS AMG",
            "nombreCocheJuego" => "mercedes_sls",
            "categoria" => "sptc",
            "marca_id" => 14
        ],

        [
            "nombre" => "GT-R NISMO 2014 GT3",
            "nombreCocheJuego" => "ks_nissan_gtr_gt3",
            "categoria" => "rccr",
            "marca_id" => 15
        ],
        [
            "nombre" => "GTR NISMO 2015",
            "nombreCocheJuego" => "ks_nissan_gtr",
            "categoria" => "sptc",
            "marca_id" => 15
        ],
        [
            "nombre" => "SKYLINE GTR R34 V-SPEC",
            "nombreCocheJuego" => "ks_nissan_skyline_r34",
            "categoria" => "sptc",
            "marca_id" => 15
        ],
        [
            "nombre" => "370Z NISMO 2016",
            "nombreCocheJuego" => "ks_nissan_370z",
            "categoria" => "sptc",
            "marca_id" => 15
        ],

        [
            "nombre" => "HUAYRA ZONDA R",
            "nombreCocheJuego" => "pagani_zonda_r",
            "categoria" => "sptc",
            "marca_id" => 16
        ],
        [
            "nombre" => "HUAYRA BC",
            "nombreCocheJuego" => "ks_pagani_huayra_bc",
            "categoria" => "sptc",
            "marca_id" => 16
        ],
        [
            "nombre" => "HUAYRA",
            "nombreCocheJuego" => "pagani_huayra",
            "categoria" => "sptc",
            "marca_id" => 16
        ],

        [
            "nombre" => "919 HYBRID 2016",
            "nombreCocheJuego" => "ks_porsche_919_hybrid_2016",
            "categoria" => "rccr",
            "marca_id" => 17
        ],
        [
            "nombre" => "919 HYBRID 2015",
            "nombreCocheJuego" => "ks_porsche_919_hybrid_2015",
            "categoria" => "rccr",
            "marca_id" => 17
        ],
        [
            "nombre" => "911 GT1",
            "nombreCocheJuego" => "ks_porsche_911_gt1",
            "categoria" => "spcl",
            "marca_id" => 17
        ],
        [
            "nombre" => "917 K",
            "nombreCocheJuego" => "ks_porsche_917_k",
            "categoria" => "clsc",
            "marca_id" => 17
        ],
        [
            "nombre" => "908 LM",
            "nombreCocheJuego" => "ks_porsche_908_lh",
            "categoria" => "spcl",
            "marca_id" => 17
        ],
        [
            "nombre" => "962C SHORT TAIL",
            "nombreCocheJuego" => "ks_porsche_962c_shorttail",
            "categoria" => "spcl",
            "marca_id" => 17
        ],
        [
            "nombre" => "962C LONG TAIL",
            "nombreCocheJuego" => "ks_porsche_962c_longtail",
            "categoria" => "spcl",
            "marca_id" => 17
        ],
        [
            "nombre" => "935 78 MOBY DICK",
            "nombreCocheJuego" => "ks_porsche_935_78_moby_dick",
            "categoria" => "clsc",
            "marca_id" => 17
        ],
        [
            "nombre" => "917 30",
            "nombreCocheJuego" => "ks_porsche_917_30",
            "categoria" => "clsc",
            "marca_id" => 17
        ],
        [
            "nombre" => "911 GT3 CUP 2017",
            "nombreCocheJuego" => "ks_porsche_911_gt3_cup_2017",
            "categoria" => "rccr",
            "marca_id" => 17
        ],
        [
            "nombre" => "911 GT3 R 2016",
            "nombreCocheJuego" => "ks_porsche_911_gt3_r_2016",
            "categoria" => "rccr",
            "marca_id" => 17
        ],
        [
            "nombre" => "911 GT3 RSR 2017",
            "nombreCocheJuego" => "ks_porsche_911_rsr_2017",
            "categoria" => "rccr",
            "marca_id" => 17
        ],
        [
            "nombre" => "911 CARRERA RSR",
            "nombreCocheJuego" => "ks_porsche_911_carrera_rsr",
            "categoria" => "clsc",
            "marca_id" => 17
        ],
        [
            "nombre" => "718 SPYDER RS",
            "nombreCocheJuego" => "ks_porsche_718_spyder_rs",
            "categoria" => "clsc",
            "marca_id" => 17
        ],
        [
            "nombre" => "718 BOXSTER S PDK",
            "nombreCocheJuego" => "ks_porsche_718_boxster_s_pdk",
            "categoria" => "sptc",
            "marca_id" => 17
        ],
        [
            "nombre" => "718 BOXSTER S",
            "nombreCocheJuego" => "ks_porsche_718_boxster_s",
            "categoria" => "sptc",
            "marca_id" => 17
        ],
        [
            "nombre" => "718 CAYMAN S",
            "nombreCocheJuego" => "ks_porsche_718_cayman_s",
            "categoria" => "sptc",
            "marca_id" => 17
        ],
        [
            "nombre" => "911 CARRERA S",
            "nombreCocheJuego" => "ks_porsche_991_carrera_s",
            "categoria" => "sptc",
            "marca_id" => 17
        ],
        [
            "nombre" => "CAYENNE",
            "nombreCocheJuego" => "ks_porsche_cayenne",
            "categoria" => "strt",
            "marca_id" => 17
        ],
        [
            "nombre" => "MACAN",
            "nombreCocheJuego" => "ks_porsche_macan",
            "categoria" => "strt",
            "marca_id" => 17
        ],
        [
            "nombre" => "PANAMERA",
            "nombreCocheJuego" => "ks_porsche_panamera",
            "categoria" => "sptc",
            "marca_id" => 17
        ],
        [
            "nombre" => "918 SPYDER",
            "nombreCocheJuego" => "ks_porsche_918_spyder",
            "categoria" => "sptc",
            "marca_id" => 17
        ],
        [
            "nombre" => "CAYMAN GT4 CLUBSPORT",
            "nombreCocheJuego" => "ks_porsche_cayman_gt4_clubsport",
            "categoria" => "sptc",
            "marca_id" => 17
        ],
        [
            "nombre" => "911 GT3 RS",
            "nombreCocheJuego" => "ks_porsche_911_gt3_rs",
            "categoria" => "sptc",
            "marca_id" => 17
        ],
        [
            "nombre" => "911 R",
            "nombreCocheJuego" => "ks_porsche_911_r",
            "categoria" => "sptc",
            "marca_id" => 17
        ],
        [
            "nombre" => "911 TURBO S",
            "nombreCocheJuego" => "ks_porsche_991_turbo_s",
            "categoria" => "sptc",
            "marca_id" => 17
        ],
        [
            "nombre" => "CAYMAN GT4 STD",
            "nombreCocheJuego" => "ks_porsche_cayman_gt4_std",
            "categoria" => "sptc",
            "marca_id" => 17
        ],

        [
            "nombre" => "R1",
            "nombreCocheJuego" => "ks_praga_r1",
            "nombreCocheJuego" => "ks_porsche_962c_shorttail",
            "categoria" => "rccr",
            "marca_id" => 18
        ],

        [
            "nombre" => "CTR YELLOWBIRD",
            "nombreCocheJuego" => "ruf_yellowbird",
            "categoria" => "clsc",
            "marca_id" => 19
        ],
        [
            "nombre" => "RT 12R",
            "nombreCocheJuego" => "ks_ruf_rt12r",
            "categoria" => "sptc",
            "marca_id" => 19
        ],
        [
            "nombre" => "RT 12R AWD",
            "nombreCocheJuego" => "ks_ruf_rt12r_awd",
            "categoria" => "sptc",
            "marca_id" => 19
        ],

        [
            "nombre" => "SCG003",
            "nombreCocheJuego" => "ks_glickenhaus_scg003",
            "categoria" => "rccr",
            "marca_id" => 20
        ],
        [
            "nombre" => "P4/5 COMPETIZIONE 2011",
            "nombreCocheJuego" => "p4-5_2011",
            "categoria" => "rccr",
            "marca_id" => 20
        ],

        [
            "nombre" => "COBRA 427",
            "nombreCocheJuego" => "shelby_cobra_427sc",
            "categoria" => "clsc",
            "marca_id" => 21
        ],

        [
            "nombre" => "FA01",
            "nombreCocheJuego" => "tatuusfa1",
            "categoria" => "rccr",
            "marca_id" => 22
        ],

        [
            "nombre" => "TS 040 HYBRID",
            "nombreCocheJuego" => "ks_toyota_ts040",
            "categoria" => "rccr",
            "marca_id" => 23
        ],
        [
            "nombre" => "SUPRA MKIV TIME ATTACK",
            "nombreCocheJuego" => "ks_toyota_supra_mkiv_tuned",
            "categoria" => "sptc",
            "marca_id" => 23
        ],
        [
            "nombre" => "CELICA ST 185",
            "nombreCocheJuego" => "ks_toyota_celica_st185",
            "categoria" => "rlly",
            "marca_id" => 23
        ],
        [
            "nombre" => "SUPRA MKIV",
            "nombreCocheJuego" => "ks_toyota_supra_mkiv",
            "categoria" => "sptc",
            "marca_id" => 23
        ],
        [
            "nombre" => "SUPRA MKIV DRIFT",
            "nombreCocheJuego" => "ks_toyota_supra_mkiv_drift",
            "categoria" => "drft",
            "marca_id" => 23
        ],
        [
            "nombre" => "GT 86",
            "nombreCocheJuego" => "ks_toyota_gt86",
            "categoria" => "strt",
            "marca_id" => 23
        ],
        [
            "nombre" => "AE86 TUNED",
            "nombreCocheJuego" => "ks_toyota_ae86_tuned",
            "categoria" => "clsc",
            "marca_id" => 23
        ],
        [
            "nombre" => "AE86 DRIFT",
            "nombreCocheJuego" => "ks_toyota_ae86_drift",
            "categoria" => "drft",
            "marca_id" => 23
        ],
        [
            "nombre" => "AE86",
            "nombreCocheJuego" => "ks_toyota_ae86",
            "categoria" => "clsc",
            "marca_id" => 23
        ]
    ];
}
