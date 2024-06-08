<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CocheResource;
use App\Http\Resources\MarcaResource;
use App\Models\Marca;

class MarcaController extends Controller
{

    /**
     * Este método se encarga de obtener
     * todas las marcas de la base de datos
     */
    public function getMarcas() {
        return MarcaResource::collection(Marca::all());
    }

    /**
     * Este método se encarga de obtener
     * una marca especifica por el id que
     * recibe el método parametro desde el cliente
     * @return MarcaResource
     */
    public function getMarcaById($id){
        $marca = Marca::findOrFail($id);
        return new MarcaResource($marca);
    }

}
