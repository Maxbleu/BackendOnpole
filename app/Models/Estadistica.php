<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Estadistica extends Model
{
    use HasFactory;
    protected $table = 'estadisticias_user';

    protected $fillable = [
        'number_lap_record',
        'number_hot_laps',
        'number_total_sesions',
        'number_total_laps',
        'user_id'
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
