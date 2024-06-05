<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstadisticaResource;
use App\Models\Estadistica;
use Illuminate\Http\Request;

class EstadisticaController extends Controller
{

    public function getGlobalRank(Request $request) {
        $allEstadisticas = Estadistica::all();
        $sortedEstadisticas = $allEstadisticas->sortByDesc('number_total_laps');
        return EstadisticaResource::collection($sortedEstadisticas);
    }


    public function update(Request $request){

    }

}
