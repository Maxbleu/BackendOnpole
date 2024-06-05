<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ComberterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\SesionResource;
use App\Models\Estadistica;
use App\Models\Sesion;
use App\Models\User;
use App\Models\Vuelta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesionController extends Controller
{

    public function getSesionId($sesion_id){
        $sesion = Sesion::findOrFail($sesion_id);
        return new SesionResource($sesion);
    }

    public function getCombination($circuito_id, $coche_id){

        $vueltasMasRapidasUsuariosEnCombinacion = [];

        $usuarios = User::whereHas('vueltas', function ($query) use ($coche_id, $circuito_id) {
            $query->where('coche_id', $coche_id)->where('circuito_id', $circuito_id);})->get();

        for($iterador = 0; $iterador<count($usuarios); $iterador++){

            $vueltaMasRapidaUsuarioEnCombinacion = Vuelta::where('user_id', $usuarios[$iterador]->id)
                                                ->where('coche_id', $coche_id)
                                                ->where('circuito_id', $circuito_id)
                                                ->orderBy('tiempo_vuelta', 'asc')
                                                ->first();

            array_push($vueltasMasRapidasUsuariosEnCombinacion,$vueltaMasRapidaUsuarioEnCombinacion);

        }

        usort($vueltasMasRapidasUsuariosEnCombinacion, function($combinacion, $nextCombinacion) {
            return $combinacion->tiempo_vuelta - $nextCombinacion->tiempo_vuelta;
        });

        $sesionesMasRapidasEnCombinacion = array_map(function($vuelta) {
            return Sesion::findOrFail($vuelta->sesion_id);
        }, $vueltasMasRapidasUsuariosEnCombinacion);



        return SesionResource::collection($sesionesMasRapidasEnCombinacion);
    }

    public function store(Request $request){

        $sesionObj = $request->json;

        $sesion = Sesion::create([
            "circuito_id" => $sesionObj["circuito_id"],
            "coche_id" => $sesionObj["coche_id"],
            "numero_mejor_vuelta" => $sesionObj["numero_mejor_vuelta"],
            "user_id" => $sesionObj["usuario_id"],
            "tipo_sesion" => $sesionObj["tipo_sesion"],
            "fecha" => $sesionObj["fecha"]
        ]);

        $vueltas = $sesionObj["vueltas"];

        $user = Auth::user();

        $vueltaMasRapidaCombinacion = Vuelta::where("coche_id", $sesion->coche_id)
        ->where("circuito_id", $sesion->circuito_id)
        ->orderBy("tiempo_vuelta", "asc")
        ->first();

        $listaVueltasSesionInsertadas = [];
        for($iterador = 0; $iterador<count($vueltas); $iterador++){

            $tiempoVuelta = $vueltas[$iterador]["sectors"][0] + $vueltas[$iterador]["sectors"][1] + $vueltas[$iterador]["sectors"][2];

            $vuelta = Vuelta::create([
                "sector_1" => $vueltas[$iterador]["sectors"][0],
                "sector_2" => $vueltas[$iterador]["sectors"][1],
                "sector_3" => $vueltas[$iterador]["sectors"][2],
                "track_limits" => $vueltas[$iterador]["cuts"],
                'numero_vuelta_sesion' => $iterador+1,
                "tiempo_vuelta" => $tiempoVuelta,
                "circuito_id" => $sesion->circuito_id,
                "coche_id" => $sesion->coche_id,
                "sesion_id" => $sesion->id,
                "user_id" => $user->id
            ]);

            array_push($listaVueltasSesionInsertadas,$vuelta);

        }

        //  Estadisticas
        $userEstadisticas = $user->estadistica;

        $userEstadisticas->number_total_laps += count($vueltas);
        $userEstadisticas->number_total_sesions++;
        $userEstadisticas->number_hot_laps++;

        $vueltaRapidaSesion = Vuelta::where("coche_id", $sesion->coche_id)
                                    ->where("circuito_id", $sesion->circuito_id)
                                    ->where("sesion_id", $sesion->id)
                                    ->orderBy("tiempo_vuelta", "asc")->first();

        if ($vueltaMasRapidaCombinacion !== null) {
            if ($vueltaRapidaSesion->tiempo_vuelta < $vueltaMasRapidaCombinacion->tiempo_vuelta) {
                $userEstadisticas->number_lap_record++;
            }
        }

        $userEstadisticas->save();


        return response()->json(['sesion_id' => $sesion->id]);

    }
}
