<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate; //puertas
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Model\Permiso;

class AuthServiceProvider extends ServiceProvider
{   
    // Politicas para proteger
    protected $policies = [
        //
    ];

    //******Gates(puertas)*******
    public function boot(): void
    {
        Gate::before(function(User $user, Permiso $permiso){
            //usuario 'admin' (tiene acceso a todo)
            if($user->permisos()->contains("manage_all")){
                return true;
            }
            // Si es otro tipo de usuario devolvemos el permiso que tiene
            return $user->pemisos()->contains($permiso); 
        });
    }
}
