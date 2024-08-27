<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Observacion extends Model
{
    use HasFactory;
    protected $table = 'observaciones';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'postulante_id',
        'reclamo_id',
        'observacion',
        'abogado',
    ];

    public function reclamo(): BelongsTo
    {
        return $this->belongsTo(Reclamo::class, 'reclamo_id');
    }

    public function postulante(): BelongsTo
    {
        return $this->belongsTo(Postulante::class, 'postulante_id');
    }
}
