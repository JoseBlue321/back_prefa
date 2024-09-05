<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pregunta extends Model
{
    use HasFactory;
    protected $table = 'preguntas';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'pregunta'
    ];

    public function detalles(): HasMany
    {
        return $this->hasMany(Detalle::class, 'pregunta_id');
    }
}
