<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Circuito extends Model
{
    use HasFactory;
    protected $table = 'circuitos';

    protected $fillable = [
        'nombre',
        'nombre_pista_juego',
        'pais'
    ];

    public function sesiones(): HasMany{
        return $this->hasMany(Sesion::class, "circuito_id");
    }

}
