<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\MensionController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\ParcialController;
use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\ReclamoController;
use App\Http\Controllers\ObservacionController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiresource('users',UserController::class);
Route::apiresource('postulantes',PostulanteController::class);
Route::apiresource('roles',RolController::class);
Route::apiresource('carreras',CarreraController::class);
Route::apiresource('mensiones',MensionController::class);
Route::apiresource('inscripciones',InscripcionController::class);
Route::apiresource('parciales',ParcialController::class);
Route::apiresource('ambientes',AmbienteController::class);
Route::apiresource('evaluaciones',EvaluacionController::class);
Route::apiresource('tipos',TipoController::class);
Route::apiresource('colaboradores',ColaboradorController::class);
Route::apiresource('reclamos',ReclamoController::class);
Route::apiresource('observaciones',ObservacionController::class);