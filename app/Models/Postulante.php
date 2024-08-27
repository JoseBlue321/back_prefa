<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Postulante extends Model
{
    use HasFactory;
    protected $table = 'postulantes';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'carnet',
        'paterno',
        'materno',
        'nombre',
        'genero',
        'fecha_nacimiento',
        'provincia',
        'departamento',
        'pais',
        'direccion',	
        'correo',	
        'telefono',	
        'estado_civil',	
        'nro_hermanos',	
        'nro_hijos',	
        'colegio',	
        'adm_colegio',	
        'turno_colegio',	
        'tipo_bachiller',	
        'tiempo_trabajo',	
        'tipo_caracteristica',	
        'tipo_vivienda',
        'ocupacion',	
        'ocupacion_padre',	
        'ocupacion_madre',	
        'imagen',	
        'cpt',	
        'fecha_pago',	
        'paralelo',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function observaciones(): HasMany
    {
        return $this->hasMany(Observacion::class, 'postulante_id');
    }
    public function inscripciones(): HasMany
    {
        return $this->hasMany(Inscripcion::class, 'postulante_id');
    }

}
