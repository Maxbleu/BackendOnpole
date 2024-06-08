<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstadisticaResource;
use App\Models\Estadistica;

class EstadisticaController extends Controller
{

    /**
     * Este método se encarga de devolver una
     * coleccion paginada de las 10 primeras
     * estadisticas de los usuarios con más
     * vueltas en la pagina y conforme el usuario
     * solicite más
     */
    public function getGlobalRank() {
        $estadisticasSortedDesc = Estadistica::orderByDesc('number_total_laps')->paginate(10);
        return EstadisticaResource::collection($estadisticasSortedDesc);
    }

}
