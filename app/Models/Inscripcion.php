<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inscripcion extends Model
{
    use HasFactory;
    protected $table = 'inscripciones';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'mension_id',
        'postulante_id',
    ];

    public function mension(): BelongsTo
    {
        return $this->belongsTo(Mension::class, 'mension_id');
    }
    public function postulante(): BelongsTo
    {
        return $this->belongsTo(Postulante::class, 'postulante_id');
    }
    public function evaluaciones(): HasMany
    {
        return $this->hasMany(Evaluacion::class, 'inscripcion_id');
    }
}
