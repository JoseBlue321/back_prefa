<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Parcial extends Model
{
    use HasFactory;
    protected $table = 'parciales';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'parcial',
        'fecha',
        'detalle',
    ];

    public function evaluaciones(): HasMany
    {
        return $this->hasMany(Evaluacion::class, 'parcial_id');
    }

    public function colaboradores(): BelongsToMany
    {
        return $this->belongsToMany(Colaborador::class, 'colaborador_parcial_table', 'colaborador_id', 'parcial_id');
    }
}
