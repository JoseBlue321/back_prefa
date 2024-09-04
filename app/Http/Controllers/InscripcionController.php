<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function index()
    {
        $inscripciones = Inscripcion::all();
        return response()->json([
            "inscripciones"=>$inscripciones
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mension_id'=>['required','numeric'],
            'postulante_id'=>['required','numeric']
        ]);
        $inscripcion = Inscripcion::create([
            'mension_id'=>$request->input('mension_id'),
            'postulante_id'=>$request->input('postulante_id'),
        ]);
        return response()->json([
            "message"=>"Registro exitoso",
            "inscripcion"=>$inscripcion
        ]);
    }

    public function show(string $id)
    {
        $inscripcion = Inscripcion::find($id);
        return response()->json([
            "inscripcion"=>$inscripcion
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'mension_id'=>['required','numeric'],
            'postulante_id'=>['required','numeric']
        ]);
        $inscripcion = Inscripcion::find($id);
        $inscripcion->update([
            'mension_id'=>$request->input('mension_id'),
            'postulante_id'=>$request->input('postulante_id'),
        ]);
        return response()->json([
            "message"=>"Registro actualizado",
            "inscripcion"=>$inscripcion
        ]);
    }

    public function destroy(string $id)
    {
        $inscripcion = Inscripcion::find($id);
        $inscripcion->delete();
        return response()->json([
            "message"=>"Registro eliminado",
            "inscripcion"=>$inscripcion
        ]);
    }
}
