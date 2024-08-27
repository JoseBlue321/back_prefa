<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use Illuminate\Http\Request;

class PostulanteController extends Controller
{
    public function index()
    {
        $postulantes = Postulante::all();
        return response()->json($postulantes,200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>['required'],
            'carnet'=>['required'],
            'nombre'=>['required'],
            'genero'=>['required','string'],
            'fecha_nacimiento'=>['required','date']
        ]);
        $postulante = Postulante::create([
            'user_id'=>$request->input('user_id'),
            'carnet'=>$request->input('carnet'),
            'nombre'=>$request->input('nombre'),
            'genero'=>$request->input('genero'),
            'fecha_nacimiento'=>$request->input('fecha_nacimiento'),
        ]);
        return response()->json(["mensaje"=>"Registro exitoso"],200);
    }

    public function show(Postulante $postulante)
    {
        $postulante = Postulante::find($postulante->id);
        return response()->json($postulante,200);
    }

    public function update(Request $request, Postulante $postulante)
    {

        $post = Postulante::find($postulante->id);
        $post->update([
            'user_id'=>$request->input('user_id'),
            'carnet'=>$request->input('carnet'),
            'nombre'=>$request->input('nombre'),
            'genero'=>$request->input('genero'),
            'fecha_nacimiento'=>$request->input('fecha_nacimiento')
        ]);
        return response()->json(["mensaje"=>"Registro actualizado"],200);
    }

    public function destroy(Postulante $postulante)
    {
        $postulante = Postulante::find($postulante->id);
        $postulante->delete();
        return response()->json(["mensaje"=>"Se ha eliminado correctamente"],200);
    }
}
