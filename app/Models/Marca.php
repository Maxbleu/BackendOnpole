<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marca extends Model
{
    use HasFactory;
    protected $table = 'marcas';

    protected $fillable = [
        'nombre',
        'pais',
        'totalCoches'
    ];

    public function coches(): HasMany{
        return $this->hasMany(Coche::class, "marca_id");
    }
}
