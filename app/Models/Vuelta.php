<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vuelta extends Model
{
    use HasFactory;

    protected $fillable = [
        "sector_1",
        "sector_2",
        "sector_3",
        'numero_vuelta_sesion',
        "tiempo_vuelta",
        "sesion_id",
        "coche_id",
        "circuito_id",
        "user_id",
        "track_limits"
    ];

    public function sesion(): BelongsTo{
        return $this->belongsTo(Sesion::class, "sesion_id");
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

}
