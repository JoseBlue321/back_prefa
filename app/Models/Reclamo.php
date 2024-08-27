<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reclamo extends Model
{
    use HasFactory;
    protected $table = 'reclamos';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'materia',
        'pagina',
        'pregunta',
        'carta',
    ];

    public function observaciones(): HasMany
    {
        return $this->hasMany(Observacion::class, 'reclamo_id');
    }
}
