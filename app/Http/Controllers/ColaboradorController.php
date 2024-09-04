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
            "message"=>"Registro exitoso",
            "colaborador"=>$colaborador
        ]);
    }

    public function show(string $id)
    {
        $colaborador = Colaborador::find($id);
        return response()->json([
            "colaborador"=>$colaborador,
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
            "message"=>"Registro actualizado",
            "colaborador"=>$colaborador
        ]);

    }

    public function destroy(string $id)
    {
        $colaborador = Colaborador::find($id);
        return response()->json([
            "message"=>"Registro eliminado",
            "colaborador"=>$colaborador
        ]);
    }

    public function store_colaborador_parcial(Request $request,string $id){
        $colaborador = Colaborador::find($id);
        $colaborador->parciales()->sync($request->input('parciales'));
        return response()->json([
            "message"=>"Registro exito",
        ]);
    }

    public function store_colaborador_evaluacion(Request $request,string $id){
        $colaborador = Colaborador::find($id);
        $colaborador->evaluaciones()->attach($request->input('evaluaciones'));
        return response()->json([
            "message"=>"Registro exito",
        ]);
    }

    public function destroy_colaborador_parcial(Request $request,string $id){
        $colaborador = Colaborador::find($id);
        $colaborador->parciales()->detach($request->input('parciales'));
        return response()->json([
            "message"=>"Registro eliminado",
        ]);
    }

    public function destroy_colaborador_evaluacion(Request $request,string $id){
        $colaborador = Colaborador::find($id);
        $colaborador->evaluaciones()->detach($request->input('evaluaciones'));
        return response()->json([
            "message"=>"Registro eliminado",
        ]);
    }
}
