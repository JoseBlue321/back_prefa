<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Evaluacion extends Model
{
    use HasFactory;
    protected $table = 'evaluaciones';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'inscripcion_id',
        'parcial_id',
        'ambiente_id',
        'nota',
        'estado',
        'hoja_respuesta',
    ];

    public function inscripcion(): BelongsTo
    {
        return $this->belongsTo(Inscripcion::class, 'inscripcion_id');
    }
    public function parcial(): BelongsTo
    {
        return $this->belongsTo(Parcial::class, 'parcial_id');
    }
    public function ambiente(): BelongsTo
    {
        return $this->belongsTo(Ambiente::class, 'ambiente_id');
    }
    public function colaboradores(): BelongsToMany
    {
        return $this->belongsToMany(Colaborador::class, 'colaborador_evaluacion_table', 'colaborador_id', 'evaluacion_id');
    }
}
