<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    public function index()
    {
        $colaboradores = Colaborador::all();
        return response()->json([
            "colaboradores"=>$colaboradores
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_id'=>['required','numeric'],
            'nombre'=>['required','string'],
            'paterno'=>['nullable','string'],
            'materno'=>['nullable','string'],
            'telefono'=>['nullable','max:150'],
        ]);
        $colaborador = Colaborador::create([
            'tipo_id'=>$request->input('tipo_id'),
            'nombre'=>$request->input('nombre'),
            'paterno'=>$request->input('paterno'),
            'materno'=>$request->input('materno'),
            'telefono'=>$request->input('telefono'),
        ]);
        return response()->json([
            "mensaje"=>"Registro exitos",
            "colaborador"=>$colaborador
        ]);
    }

    public function show(string $id)
    {
        $colaborador = Colaborador::find($id);
        return response()->json([
            "colaborador"=>$colaborador
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipo_id'=>['required','numeric'],
            'nombre'=>['required','string'],
            'paterno'=>['nullable','string'],
            'materno'=>['nullable','string'],
            'telefono'=>['nullable','max:150'],
        ]);
        $colaborador = Colaborador::find($id);
        $colaborador->update([
            'tipo_id'=>$request->input('tipo_id'),
            'nombre'=>$request->input('nombre'),
            'paterno'=>$request->input('paterno'),
            'materno'=>$request->input('materno'),
            'telefono'=>$request->input('telefono'),
        ]);
        return response()->json([
            "mensaje"=>"Registro actualizado",
            "colaborador"=>$colaborador
        ]);

    }

    public function destroy(string $id)
    {
        $colaborador = Colaborador::find($id);
        return response()->json([
            "mensaje"=>"Registro eliminado",
            "colaborador"=>$colaborador
        ]);
    }
}
