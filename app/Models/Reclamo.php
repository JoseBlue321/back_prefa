<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reclamo extends Model
{
    use HasFactory;
    protected $table = 'reclamos';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'postulante_id',
        'parcial_id',
        'reclamo',
        'abogado',
        'carta'
    ];

    public function postulante(): BelongsTo
    {
        return $this->belongsTo(Postulante::class, 'postulante_id');
    }
    public function parcial(): BelongsTo
    {
        return $this->belongsTo(Parcial::class, 'parcial_id');
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(Detalle::class, 'reclamo_id');
    }
}
