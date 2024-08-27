<?php

namespace App\Http\Controllers;

use App\Models\Observacion;
use Illuminate\Http\Request;

class ObservacionController extends Controller
{
    public function index()
    {
        $observaciones = Observacion::all();
        return response()->json([
            "observaciones"=>$observaciones
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'postulante_id'=>['required','numeric'],
            'reclamo_id'=>['required','numeric'],
            'observacion'=>['nullable','string'],
            'abogado'=>['nullable','boolean'],
        ]);
        $observacion = Observacion::create([
            'postulante_id'=>$request->input('postulante_id'),
            'reclamo_id'=>$request->input('reclamo_id'),
            'observacion'=>$request->input('observacion'),
            'abogado'=>$request->input('abogado'),
        ]);
        return response()->json([
            "mensaje"=>"Registro exitoso",
            "observacion"=>$observacion
        ]);
    }

    public function show(string $id)
    {
        $observacion = Observacion::find($id);
        return response()->json([
            "observacion"=>$observacion
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'postulante_id'=>['required','numeric'],
            'reclamo_id'=>['required','numeric'],
            'observacion'=>['nullable','string'],
            'abogado'=>['nullable','boolean'],
        ]);
        $observacion = Observacion::find($id);
        $observacion->update([
            'postulante_id'=>$request->input('postulante_id'),
            'reclamo_id'=>$request->input('reclamo_id'),
            'observacion'=>$request->input('observacion'),
            'abogado'=>$request->input('abogado'),
        ]);
        return response()->json([
            "mensaje"=>"Registro actualizado",
            "observacion"=>$observacion
        ]);
    }

    public function destroy(string $id)
    {
        $observacion = Observacion::find($id);
        $observacion->delete();
        return response()->json([
            "mensaje"=>"Registro eliminado",
            "observacion"=>$observacion
        ]);
    }
}
