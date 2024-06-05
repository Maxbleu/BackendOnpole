<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coche extends Model
{
    use HasFactory;
    protected $table = 'coches';

    protected $fillable = [
        'nombre',
        'nombreCocheJuego',
        'categoria',
        'marca_id'
    ];

    public function marca(): BelongsTo{
        return $this->belongsTo(Marca::class,"marca_id");
    }

    public function sesiones(): HasMany{
        return $this->hasMany(Sesion::class, "coche_id");
    }
}
