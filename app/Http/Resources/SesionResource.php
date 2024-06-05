<?php

namespace App\Http\Resources;

use App\Models\Vuelta;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SesionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'circuito' => $this->circuito,
            'coche' => $this->coche,
            'vueltas' => $this->vueltas,
            'numero_mejor_vuelta' => $this->numero_mejor_vuelta,
            'user' => $this->user,
            'fecha' => $this->fecha
        ];
    }
}
