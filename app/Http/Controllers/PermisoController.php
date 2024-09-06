<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    public function index()
    {
        $permisos = Permiso::all();
        return response()->json([
            "permisos"=>$permisos
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'permiso'=>['required','string'],
            'descripcion'=>['nullable','string']
        ]);
        $permiso = Permiso::create([
            'permiso'=>$request->input('permiso'),
            'descripcion'=>$request->input('descripcion')
        ]);
        return response()->json([
            "message"=>"Registro exitoso",
            "permiso"=>$permiso
        ]);
    }

    public function show(string $id)
    {
        $permiso = Permiso::findOrFail($id);
        return response()->json([
            "permiso"=>$permiso
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'permiso'=>['required','string'],
            'descripcion'=>['nullable','string']
        ]);
        $permiso = Permiso::findOrFail($id);
        $permiso->update([
            'permiso'=>$request->input('permiso'),
            'descripcion'=>$request->input('descripcion')
        ]);
        return response()->json([
            "message"=>"Registro actualizado",
            "permiso"=>$permiso
        ]);
    }

    public function destroy(string $id)
    {
        $permiso = Permiso::findOrFail($id);
        $permiso->delete();
        return response()->json([
            "message"=>"Registro eliminado",
            "permiso"=>$permiso
        ]);
    }
}
