<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VueltaResource;
use App\Models\Vuelta;
use Illuminate\Support\Facades\DB;

class VueltaController extends Controller
{

    /**
     * Este método se encarga de devolver la lista
     * de las mejores vueltas de todos los usuarios
     * que tengan una vuelta en esa combinacion
     * @param $circuito_id
     * @param $coche_id
     */
    public function getCombination($circuito_id, $coche_id)
    {
        // Utilizamos una subconsulta para obtener la vuelta más rápida de cada usuario
        // para la combinación especificada directamente en la consulta de la base de datos.
        $subQuery = Vuelta::select('user_id', DB::raw('MIN(tiempo_vuelta) as tiempo_vuelta_minimo'))
        ->where('coche_id', $coche_id)
        ->where('circuito_id', $circuito_id)
        ->groupBy('user_id');

        // Hacemos una consulta principal que une esta subconsulta con la tabla de vueltas
        // para obtener los detalles completos de las vueltas más rápidas.
        $vueltasMasRapidasUsuariosEnCombinacion = Vuelta::joinSub($subQuery, 'vueltas_minimas', function ($join) {
            $join->on('vueltas.user_id', '=', 'vueltas_minimas.user_id')
                ->on('vueltas.tiempo_vuelta', '=', 'vueltas_minimas.tiempo_vuelta_minimo');
        })
        ->orderBy('tiempo_vuelta', 'asc')
        ->paginate(10);

        // Devolvemos la colección de sesiones ya paginada
        return VueltaResource::collection($vueltasMasRapidasUsuariosEnCombinacion);
    }

}
