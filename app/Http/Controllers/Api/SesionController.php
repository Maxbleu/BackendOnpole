<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SesionResource;
use App\Models\Sesion;
use App\Models\Vuelta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesionController extends Controller
{

    /**
     * Este método se encarga de obtener una
     * sesion específica por el id de la sesion
     * @return SesionResource
     */
    public function getSesionId($sesion_id){
        $sesion = Sesion::findOrFail($sesion_id);
        return new SesionResource($sesion);
    }

    /**
     * Este método se encarga de insertar
     * una sesion en la base de datos
     * @param $request
     */
    public function store(Request $request){

        //  Obtenemos el usuario
        $user = Auth::user();

        $sesionObj = $request->json;

        //  Insertamos la sesion en la base de datos
        $sesion = Sesion::create([
            "circuito_id" => $sesionObj["circuito_id"],
            "coche_id" => $sesionObj["coche_id"],
            "numero_mejor_vuelta" => $sesionObj["numero_mejor_vuelta"],
            "user_id" => $sesionObj["usuario_id"],
            "tipo_sesion" => $sesionObj["tipo_sesion"],
            "fecha" => $sesionObj["fecha"]
        ]);

        $vueltas = $sesionObj["vueltas"];

        // Antes de insertar las vueltas de la nueva sesión, obtenemos la vuelta más rápida
        // de la combinación;

        // ¡IMPORTANTE!
        // Realizamos este paso para asegurarnos de que, al comparar tiempos,
        // reconocemos correctamente el mejor tiempo actual antes de añadir nuevas vueltas.
        // Ya que, si una de las nuevas vueltas supera el mejor tiempo existente,
        // debemos asegurarnos de actualizar correctamente nuestro registro del tiempo más rápido.
        // Sino, podríamos acabar reconociendo erróneamente una vuelta recién añadida
        // como la más rápida sin considerar adecuadamente los tiempos anteriores.

        $vueltaMasRapidaCombinacion = Vuelta::where("coche_id", $sesion->coche_id)
        ->where("circuito_id", $sesion->circuito_id)
        ->orderBy("tiempo_vuelta", "asc")
        ->first();

        $listaVueltasSesionInsertadas = [];

        //  Recorremos todas las vueltas
        //  realizadas en la sesion
        for($iterador = 0; $iterador<count($vueltas); $iterador++){

            //  Obtenemos el tiempo total de la vuelta juntando el tiempo de todos los sectores
            $tiempoVuelta = $vueltas[$iterador]["sectors"][0] + $vueltas[$iterador]["sectors"][1] + $vueltas[$iterador]["sectors"][2];

            $vuelta = Vuelta::create([
                "sector_1" => $vueltas[$iterador]["sectors"][0],
                "sector_2" => $vueltas[$iterador]["sectors"][1],
                "sector_3" => $vueltas[$iterador]["sectors"][2],
                'numero_vuelta_sesion' => $iterador+1,
                "tiempo_vuelta" => $tiempoVuelta,
                "circuito_id" => $sesion->circuito_id,
                "coche_id" => $sesion->coche_id,
                "sesion_id" => $sesion->id,
                "user_id" => $user->id
            ]);

            //  Guardamos la vuelta insertada en la base de datos
            //  para posteriormente actualizar las estadisticas
            //  del usuario
            array_push($listaVueltasSesionInsertadas,$vuelta);

        }

        //  Obtenemos las estadisticas del usuario
        $userEstadisticas = $user->estadistica;

        //  Actualizamos el numero total de vueltas analizadas
        $userEstadisticas->number_total_laps += count($vueltas);

        //  Actualizamos el numero total de sesiones analizadas
        $userEstadisticas->number_total_sesions++;

        //  Actualizamos el numero total de hot laps realizadas
        $userEstadisticas->number_hot_laps++;

        //  Ahora obtenemos vuelta más rápida de la sesión

        $vueltaRapidaSesion = Vuelta::where("coche_id", $sesion->coche_id)
                                    ->where("circuito_id", $sesion->circuito_id)
                                    ->where("sesion_id", $sesion->id)
                                    ->orderBy("tiempo_vuelta", "asc")->first();

        //  Comprobamos primero si es diferente de null
        //  ya que, puede darse el caso de que no haya sido
        //  insertada una vuelta en esta combinación

        //  ¿Porque hago esta comprobación?
        //  Considero bajo mi criterio que un lap record
        //  debe ser batido frente a otro jugador y no un
        //  simple relleno de leaderboard porque sí, por esta
        //  razón yo hago esta comprobación, para evitar que tu
        //  puedas insertar una sesion en una combinacion que no
        //  tenga sesiones analizadas y así fomentar la competitivadad.

        if ($vueltaMasRapidaCombinacion !== null) {

            //  Comprobamos si el mejor tiempo de la sesion es
            //  más rapido que el mejor tiempo de la combinacion en la web
            if ($vueltaRapidaSesion->tiempo_vuelta < $vueltaMasRapidaCombinacion->tiempo_vuelta) {

                //  Actualizamos el numero de lap records en +1
                $userEstadisticas->number_lap_record++;
            }
        }

        //  Actualizamos los cambios
        $userEstadisticas->save();

        //  Enviamos el sesion id de la sesion insertada

        return response()->json(['sesion_id' => $sesion->id]);

    }
}
