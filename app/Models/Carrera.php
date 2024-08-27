<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carrera extends Model
{
    use HasFactory;
    protected $table = 'carreras';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'carrera',
    ];

    public function mensiones(): HasMany
    {
        return $this->hasMany(Mension::class, 'carrera_id');
    }
}
