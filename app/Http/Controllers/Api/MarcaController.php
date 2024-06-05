<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CocheResource;
use App\Http\Resources\MarcaResource;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function getMarcas() {
        return MarcaResource::collection(Marca::all());
    }

    public function getMarcaById($id){
        return new MarcaResource(Marca::findOrFail($id));
    }

}
