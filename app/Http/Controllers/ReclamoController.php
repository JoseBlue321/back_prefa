<?php

namespace App\Http\Controllers;

use App\Models\Reclamo;
use Illuminate\Http\Request;

class ReclamoController extends Controller
{
    public function index()
    {
        $reclamos = Reclamo::all();
        return response()->json([
            "reclamos"=>$reclamos
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'materia'=>['required','string'],
            'pagina'=>['nullable','string'],
            'pregunta'=>['required','numeric'],
            'carta'=>['required','string'],
        ]);
        $reclamo = Reclamo::create([
            'materia'=>$request->input('materia'),
            'pagina'=>$request->input('pagina'),
            'pregunta'=>$request->input('pregunta'),
            'carta'=>$request->input('carta'),
        ]);
        return response()->json([
            "mensaje"=>"Registro exitoso",
            "reclamo"=>$reclamo
        ]);
    }

    public function show(string $id)
    {
        $reclamo = Reclamo::find($id);
        return response()->json([
            "reclamo"=>$reclamo
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'materia'=>['required','string'],
            'pagina'=>['nullable','string'],
            'pregunta'=>['required','numeric'],
            'carta'=>['required','string'],
        ]);
        $reclamo = Reclamo::find($id);
        $reclamo->update([
            'materia'=>$request->input('materia'),
            'pagina'=>$request->input('pagina'),
            'pregunta'=>$request->input('pregunta'),
            'carta'=>$request->input('carta'),
        ]);
        return response()->json([
            "mensaje"=>"Registro actualizado",
            "reclamo"=>$reclamo
        ]);
    }

    public function destroy(string $id)
    {
        $reclamo = Reclamo::find($id);
        $reclamo->delete();
        return response()->json([
            "mensaje"=>"Registro eliminado",
            "reclamo"=>$reclamo
        ]);
    }
}
