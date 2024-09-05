<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use Illuminate\Http\Request;

class DetalleController extends Controller
{
    public function index()
    {
        $detalles = Detalle::all();
        return response()->json([
            'detalles'=>$detalles
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pregunta_id'=>['required','numeric'],
            'reclamo_id'=>['required','numeric'],
            'detalle'=>['required','string']
        ]);
        $detalle = Detalle::create([
            'pregunta_id'=>$request->input('pregunta_id'),
            'reclamo_id'=>$request->input('reclamo_id'),
            'detalle'=>$request->input('detalle'),
        ]);
        return response()->json([
            'message'=>'Registro exitoso',
            'detalle'=>$detalle
        ]);
    }

    public function show(string $id)
    {
        $detalle = Detalle::find($id);
        return response()->json([
            'detalle'=>$detalle
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'pregunta_id'=>['required','numeric'],
            'reclamo_id'=>['required','numeric'],
            'detalle'=>['required','string']
        ]);
        $detalle = Detalle::find($id);
        $detalle->update([
            'pregunta_id'=>$request->input('pregunta_id'),
            'reclamo_id'=>$request->input('reclamo_id'),
            'detalle'=>$request->input('detalle'),
        ]);
        return response()->json([
            'message'=>'Registro actualizado',
            'detalle'=>$detalle
        ]);

    }

    public function destroy(string $id)
    {
        $detalle = Detalle::find($id);
        $detalle->delete();
        return response()->json([
            'message'=>'Registro Eliminado',
            'detalle'=>$detalle
        ]);
    }
}
