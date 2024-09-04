<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Colaborador extends Model
{
    use HasFactory;
    protected $table = 'colaboradores';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'tipo_id',
        'nombre',
        'paterno',
        'materno',
        'telefono',
    ];

    public function tipo(): BelongsTo
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }

    public function parciales(): BelongsToMany
    {
        return $this->belongsToMany(Parcial::class, 'colaborador_parcial', 'colaborador_id', 'parcial_id');
    }

    public function evaluaciones(): BelongsToMany
    {
        return $this->belongsToMany(Evaluacion::class, 'colaborador_evaluacion', 'colaborador_id', 'evaluacion_id');
    }
}
