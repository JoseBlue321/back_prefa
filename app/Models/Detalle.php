<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detalle extends Model
{
    use HasFactory;
    protected $table = 'detalles';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'pregunta_id',
        'reclamo_id',
        'detalle'
    ];

    public function pregunta(): BelongsTo
    {
        return $this->belongsTo(Pregunta::class, 'pregunta_id');
    }
    public function reclamo(): BelongsTo
    {
        return $this->belongsTo(Reclamo::class, 'reclamo_id');
    }
}
