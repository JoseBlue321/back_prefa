<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipo extends Model
{
    use HasFactory;
    protected $table = 'tipos';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'tipo',
    ];

    public function colaboradores(): HasMany
    {
        return $this->hasMany(Colaborador::class, 'tipo_id');
    }
}
