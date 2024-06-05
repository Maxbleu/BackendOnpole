<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CircuitoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        if(strpos($this->nombre_pista_juego,", ")){
            $nombresPistasJuego = explode(", ", $this->nombre_pista_juego);
        }else{
            $nombresPistasJuego = [$this->nombre_pista_juego];
        }

        return [
            "id" => $this->id,
            "nombre" => $this->nombre,
            "nombre_pista_juego" => $nombresPistasJuego,
            "pais" => $this->pais
        ];
    }
}
