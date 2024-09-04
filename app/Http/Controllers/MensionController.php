<?php

namespace App\Http\Controllers;

use App\Models\Mension;
use Illuminate\Http\Request;

class MensionController extends Controller
{
    public function index()
    {
        $mensiones = Mension::all();
        return response()->json([
            "mensiones"=>$mensiones
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'carrera_id'=>['required','numeric'],
            'mension'=>['nullable','string'],
        ]);
        $mension = Mension::create([
            'carrera_id'=>$request->input('carrera_id'),
            'mension'=>$request->input('mension'),
        ]);
        return response()->json([
            "message"=>"Registro exitoso",
            "mension"=>$mension
        ]);
    }

    public function show(string $id)
    {
        $mension = Mension::find($id);
        return response()->json([
            "mension"=>$mension
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'carrera_id'=>['required','numeric'],
            'mension'=>['nullable','string'],
        ]);
        $mension = Mension::find($id);
        $mension->update([
            'carrera_id'=>$request->input('carrera_id'),
            'mension'=>$request->input('mension'),
        ]);
        return response()->json([
            "message"=>"Registro actualizado",
            "mension"=>$mension
        ]);

    }

    public function destroy(string $id)
    {
        $mension = Mension::find($id);
        $mension->delete();
        return response()->json([
            "message"=>"Registro eliminado",
            "mension"=>$mension
        ]);
    }
}
