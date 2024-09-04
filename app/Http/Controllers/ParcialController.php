<?php

namespace App\Http\Controllers;

use App\Models\Parcial;
use Illuminate\Http\Request;

class ParcialController extends Controller
{
    public function index()
    {
        $parciales = Parcial::all();
        return response()->json([
            "parciales"=>$parciales
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'parcial'=>['required','string'],
            'fecha'=>['required','date'],
            'detalle'=>['nullable','string']
        ]);
        $parcial = Parcial::create([
            'parcial'=>$request->input('parcial'),
            'fecha'=>$request->input('fecha'),
            'detalle'=>$request->input('detalle')
        ]);
        return response()->json([
            "message"=>"Registro exitoso",
            "parcial"=>$parcial
        ]);
    }

    public function show(string $id)
    {
        $parcial = Parcial::find($id);
        return response()->json([
            "parcial"=>$parcial
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'parcial'=>['required','string'],
            'fecha'=>['required','date'],
            'detalle'=>['nullable','string']
        ]);
        $parcial = Parcial::find($id);
        $parcial->update([
            'parcial'=>$request->input('parcial'),
            'fecha'=>$request->input('fecha'),
            'detalle'=>$request->input('detalle')
        ]);
        return response()->json([
            "message"=>"Registro Actualiazado",
            "parcial"=>$parcial
        ]);
    }

    public function destroy(string $id)
    {
        $parcial = Parcial::find($id);
        $parcial->delete();
        return response()->json([
            "message"=>"Registro eliminado",
            "parcial"=>$parcial
        ]);
    }
}
