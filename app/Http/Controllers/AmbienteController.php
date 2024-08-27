<?php

namespace App\Http\Controllers;

use App\Models\Ambiente;
use Illuminate\Http\Request;

class AmbienteController extends Controller
{
    public function index()
    {
        $ambientes = Ambiente::all();
        return response()->json([
            "ambientes"=>$ambientes
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'edificio'=>['required','string'],
            'piso'=>['required','string'],
            'aula'=>['string','required'],
            'capacidad'=>['required','numeric'],
            'sillas'=>['required','numeric'],
            'tableros'=>['required','numeric']
        ]);
        $ambiente = Ambiente::create([
            'edificio'=>$request->input('edificio'),
            'piso'=>$request->input('piso'),
            'aula'=>$request->input('aula'),
            'capacidad'=>$request->input('capacidad'),
            'sillas'=>$request->input('sillas'),
            'tableros'=>$request->input('tableros')
        ]);
        return response()->json([
            "mensaje"=>"Registro exitoso",
            "ambiente"=>$ambiente
        ]);
    }

    public function show(string $id)
    {
        $ambiente = Ambiente::find($id);
        return response()->json([
            "ambiente"=>$ambiente
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'edificio'=>['required','string'],
            'piso'=>['required','string'],
            'aula'=>['string','required'],
            'capacidad'=>['required','numeric'],
            'sillas'=>['required','numeric'],
            'tableros'=>['required','numeric']
        ]);
        $ambiente = Ambiente::find($id);
        $ambiente->update([
            'edificio'=>$request->input('edificio'),
            'piso'=>$request->input('piso'),
            'aula'=>$request->input('aula'),
            'capacidad'=>$request->input('capacidad'),
            'sillas'=>$request->input('sillas'),
            'tableros'=>$request->input('tableros')
        ]);
        return response()->json([
            "mensaje"=>"Registro actualizado",
            "ambiente"=>$ambiente
        ]);

    }

    public function destroy(string $id)
    {
        $ambiente = Ambiente::find($id);
        $ambiente->delete();
        return response()->json([
            "mensaje"=>"Registro eliminado",
            "ambiente"=>$ambiente
        ]);
    }
}
