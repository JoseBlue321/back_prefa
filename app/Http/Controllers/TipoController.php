<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();
        return response()->json([
            "tipos"=>$tipos
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo'=>['required','string']
        ]);
        $tipo = Tipo::create([
            'tipo'=>$request->input('tipo')
        ]);
        return response()->json([
            "message"=>"Registro exitoso",
            "tipo"=>$tipo
        ]);
    }

    public function show(string $id)
    {
        $tipo = Tipo::find($id);
        return response()->json([
            "tipo"=>$tipo
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipo'=>['required','string']
        ]);
        $tipo = Tipo::find($id);
        $tipo->update([
            'tipo'=>$request->input('tipo')
        ]);
        return response()->json([
            "message"=>"Registro actualizado",
            "tipo"=>$tipo
        ]);
    }

    public function destroy(string $id)
    {
        $tipo = Tipo::find($id);
        $tipo->delete();
        return response()->json([
            "message"=>"Registro eliminado",
            "tipo"=>$tipo
        ]);
    }
}
