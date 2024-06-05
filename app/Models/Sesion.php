<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sesion extends Model
{
    use HasFactory;
    protected $table = 'sesiones';

    protected $fillable = [
        "circuito_id",
        "coche_id",
        "numero_mejor_vuelta",
        "user_id",
        "tipo_sesion",
        "fecha"
    ];

    public function vueltas(): HasMany{
        return $this->hasMany(Vuelta::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function coche(): BelongsTo{
        return $this->belongsTo(Coche::class, "coche_id");
    }

    public function circuito(): BelongsTo{
        return $this->belongsTo(Circuito::class, "circuito_id");
    }


}
