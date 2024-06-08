<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VueltaResource;
use App\Models\Vuelta;

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
        //  Obtenemos a través de una setencia eloquent
        //  las vueltas más rapdias del usuario en la combinacion
        $vueltasMasRapidasUsuariosEnCombinacion = Vuelta::whereIn('id', function($query) use ($coche_id, $circuito_id) {
            $query->from('vueltas')
                ->selectRaw('MAX(id)')
                ->where('coche_id', $coche_id)
                ->where('circuito_id', $circuito_id)
                ->groupBy('user_id');
        })
            ->where('coche_id', $coche_id)
            ->where('circuito_id', $circuito_id)
            ->orderBy('tiempo_vuelta', 'asc')
            ->paginate(10);

        return VueltaResource::collection($vueltasMasRapidasUsuariosEnCombinacion);

    }

}
