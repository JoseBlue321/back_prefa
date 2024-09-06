<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'roles';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'rol',
        'descripcion'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'rol_user', 'rol_id', 'user_id');
    }

    public function permisos(): BelongsToMany
    {
        return $this->belongsToMany(Permiso::class, 'permiso_rol', 'rol_id','permiso_id');
    }
}
