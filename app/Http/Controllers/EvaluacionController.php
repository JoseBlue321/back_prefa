<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    public function index()
    {
        $evaluaciones = Evaluacion::all();
        return response()->json([
            "evaluaciones"=>$evaluaciones
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'inscripcion_id'=>['required','numeric'],
            'parcial_id'=>['required','numeric'],
            'ambiente_id'=>['required','numeric'],
            'nota'=>['required','numeric'],
            'estado'=>['nullable','boolean'],
            'hoja_respuesta'=>['nullable','string'],
        ]);
        $evaluacion = Evaluacion::create([
            'inscripcion_id'=>$request->input('inscripcion_id'),
            'parcial_id'=>$request->input('parcial_id'),
            'ambiente_id'=>$request->input('ambiente_id'),
            'nota'=>$request->input('nota'),
            'estado'=>$request->input('estado'),
            'hoja_respuesta'=>$request->input('hoja_respuesta'),
        ]);
        return response()->json([
            "mensaje"=>"Registro exitoso",
            "evaluacion"=>$evaluacion
        ]);
    }

    public function show(string $id)
    {
        $evaluacion = Evaluacion::find($id);
        return response()->json([
            "evaluacion"=>$evaluacion
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'inscripcion_id'=>['required','numeric'],
            'parcial_id'=>['required','numeric'],
            'ambiente_id'=>['required','numeric'],
            'nota'=>['required','numeric'],
            'estado'=>['nullable','boolean'],
            'hoja_respuesta'=>['nullable','string'],
        ]);
        $evaluacion = Evaluacion::find($id);
        $evaluacion->update([
            'inscripcion_id'=>$request->input('inscripcion_id'),
            'parcial_id'=>$request->input('parcial_id'),
            'ambiente_id'=>$request->input('ambiente_id'),
            'nota'=>$request->input('nota'),
            'estado'=>$request->input('estado'),
            'hoja_respuesta'=>$request->input('hoja_respuesta'),
        ]);
        return response()->json([
            "mensaje"=>"Registro actualizado",
            "evaluacion"=>$evaluacion
        ]);
    }

    public function destroy(string $id)
    {
        $evaluacion = Evaluacion::find($id);
        $evaluacion->delete();
        return response()->json([
            "mensaje"=>"Registro eliminado",
            "evaluacion"=>$evaluacion
        ]);
    }
}
