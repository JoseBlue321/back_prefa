<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\MensionController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\ParcialController;
use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\ReclamoController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermisoController;

use App\Http\Controllers\ConsultaController;

//***************Autentication*******************/
Route::post('login',[AuthController::class,'login'])->name('login'); //login de ingreso
Route::post('registro',[AuthController::class,'registro']); //Registro de usuario

//***************Rutas Protegidas por middleware (Police)*******************/
Route::middleware(['auth:sanctum'])->group(function () {
    //********perfil y logout**********
    Route::get('perfil',[AuthController::class,'perfil']); //Perfil del usuario
    Route::post('logout',[AuthController::class,'logout']); //logout salir del sistema 
    
    //********Logica de negocio (Sistema)**********
    
    
    Route::apiresource('postulantes',PostulanteController::class);
    Route::post('postulantes/{id}',[PostulanteController::class,'store_img']);
    Route::apiresource('carreras',CarreraController::class);
    Route::apiresource('mensiones',MensionController::class);
    Route::apiresource('inscripciones',InscripcionController::class);
    Route::apiresource('parciales',ParcialController::class);
    Route::apiresource('ambientes',AmbienteController::class);
    Route::apiresource('evaluaciones',EvaluacionController::class);
    Route::post('evaluaciones/{id}',[EvaluacionController::class,'store_img']);
    Route::apiresource('tipos',TipoController::class);
    Route::apiresource('colaboradores',ColaboradorController::class);
    Route::post('colaboradores/parciales/{id}',[ColaboradorController::class,'store_colaborador_parcial']);
    Route::post('colaboradores/evaluaciones/{id}',[ColaboradorController::class,'store_colaborador_evaluacion']);
    Route::delete('colaboradores/parciales/{id}',[ColaboradorController::class,'destroy_colaborador_parcial']);
    Route::delete('colaboradores/evaluaciones/{id}',[ColaboradorController::class,'destroy_colaborador_evaluacion']);
    Route::apiresource('preguntas',PreguntaController::class);
    Route::apiresource('reclamos',ReclamoController::class);
    Route::apiresource('detalles',DetalleController::class);

    //********Roles y Permisos**********
    
    
});
Route::apiresource('roles',RolController::class);
Route::apiresource('permisos',PermisoController::class);

Route::apiresource('users',UserController::class);
Route::post('users/roles/{id}',[UserController::class,'store_roles']);
Route::post('roles/permisos/{id}',[RolController::class,'store_permisos']);

