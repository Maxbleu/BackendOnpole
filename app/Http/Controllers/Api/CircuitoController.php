<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CircuitoResource;
use App\Models\Circuito;
use Illuminate\Http\Request;

class CircuitoController extends Controller
{
    public function getAllCircuitos() {
        return CircuitoResource::collection(Circuito::all());
    }

    public function getCircuitoById($id){
        return Circuito::where("id","=",$id);
    }
}
