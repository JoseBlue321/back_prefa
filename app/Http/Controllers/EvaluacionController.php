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
        ]);
        $evaluacion = Evaluacion::create([
            'inscripcion_id'=>$request->input('inscripcion_id'),
            'parcial_id'=>$request->input('parcial_id'),
            'ambiente_id'=>$request->input('ambiente_id'),
            'nota'=>$request->input('nota'),
            'estado'=>$request->input('estado'),
        ]);
        return response()->json([
            "message"=>"Registro exitoso",
            "evaluacion"=>$evaluacion
        ]);
    }
    public function store_img(Request $request, string $id){
        $request->validate([
            'hoja_respuesta'=>['required','image','mimes:jpeg,png,jpg,gif','max:2048'],
        ]);
        //almacenamos la imagen en el directorio: 'public/images'
        $evaluacion = Evaluacion::find($id);

        if ($request->hasFile('hoja_respuesta')) {
            $image = $request->file('hoja_respuesta');
            $imageName = $evaluacion->inscripcion->postulante->carnet . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('evaluaciones/'.$evaluacion->parcial_id), $imageName);
            // Obtenemos la URL relativa de la imagen
            $imageUrl = 'evaluaciones/'.$evaluacion->parcial_id .'/' . $imageName;
        }else{
            $imageUrl = '';
        }
        //Almacenamos toda la información en la BD
        $evaluacion->update([
            'hoja_respuesta'=>$imageUrl,
        ]);
        return response()->json(["message"=>"Registro exitoso"],200);
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
        ]);
        $evaluacion = Evaluacion::find($id);
        $evaluacion->update([
            'inscripcion_id'=>$request->input('inscripcion_id'),
            'parcial_id'=>$request->input('parcial_id'),
            'ambiente_id'=>$request->input('ambiente_id'),
            'nota'=>$request->input('nota'),
            'estado'=>$request->input('estado'),
        ]);
        return response()->json([
            "message"=>"Registro actualizado",
            "evaluacion"=>$evaluacion
        ]);
    }

    public function destroy(string $id)
    {
        $evaluacion = Evaluacion::find($id);
        $evaluacion->delete();
        return response()->json([
            "message"=>"Registro eliminado",
            "evaluacion"=>$evaluacion
        ]);
    }
}
