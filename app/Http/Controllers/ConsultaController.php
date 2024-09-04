<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function listar(){
        $postulantes = DB::select('select id,carnet,nombre,genero from postulantes');
        return response()->json([
            "postulantes"=>$postulantes
        ]);
    }
}
