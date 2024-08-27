<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ambiente extends Model
{
    use HasFactory;
    protected $table = 'ambientes';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'edificio',
        'piso',
        'aula',
        'capacidad',
        'sillas',
        'tablero',
    ];

    public function evaluaciones(): HasMany
    {
        return $this->hasMany(Evaluacion::class, 'ambiente_id');
    }
}
