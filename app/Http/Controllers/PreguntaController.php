<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    public function index()
    {
        $preguntas = Pregunta::all();
        return response()->json([
            'preguntas'=>$preguntas
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pregunta'=>['required','numeric','max:100','unique:preguntas,pregunta']
        ]);
        $pregunta = Pregunta::create([
            'pregunta'=>$request->input('pregunta')
        ]);
        return response()->json([
            'message'=>'Registro exitoso',
            'pregunta'=>$pregunta
        ]);
    }

    public function show(string $id)
    {
        $pregunta = Pregunta::find($id);
        return response()->json([
            'pregunta'=>$pregunta
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'pregunta'=>['required','numeric','max:100','unique:preguntas,pregunta']
        ]);
        $pregunta = Pregunta::find($id);
        $pregunta->update([
            'pregunta'=>$request->input('pregunta')
        ]);
        return response()->json([
            'message'=>'Registro actualizado',
            'pregunta'=>$pregunta
        ]);
    }

    public function destroy(string $id)
    {
        $pregunta = Pregunta::find($id);
        $pregunta->delete();
        return response()->json([
            'message'=>'Registro eliminado',
            'pregunta'=>$pregunta
        ]);
    }
}
