<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function index()
    {
        $carreras = Carrera::all();
        return response()->json([
            "carreras"=>$carreras
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'carrera'=>['required','string']
        ]);
        $carrera = Carrera::create([
            'carrera'=>$request->input('carrera')
        ]);
        return response()->json([
            "message"=>"Registro exitoso",
            "carrera"=>$carrera
        ]);
    }

    public function show(string $id)
    {
        $carrera = Carrera::find($id);
        return response()->json([
            "carrera"=>$carrera
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'carrera'=>['required','string']
        ]);
        $carrera = Carrera::find($id);
        $carrera->update([
            'carrera'=>$request->input('carrera')
        ]);
        return response()->json([
            "message"=>"Registro actualizado",
            "carrera"=>$carrera,
        ]);

    }

    public function destroy(string $id)
    {
        $carrera = Carrera::find($id);
        $carrera->delete();
        return response()->json([
            "message"=>"Registro eliminado",
            "carrera"=>$carrera
        ]);
    }
}
