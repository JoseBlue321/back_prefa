<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $rol = Rol::all();
        return response()->json($rol,200);
    }

    public function store(Request $request)
    {
        //validacion de los datos
        $request->validate([
            'user_id'=>['required','numeric'],
            'rol'=>['required','string']
        ]);
        //registro a la base de datos
        $rol = Rol::create([
            'user_id'=>$request->input('user_id'),
            'rol'=>$request->input('rol'),
        ]);
        //devolvemos un mensaje y la informacion del rol
        return response()->json([
            "mensaje"=>"validacion exitosa",
            "rol"=>$rol
        ],200);
    }

    public function show(string $id)
    {
        $rol = Rol::find($id);
        return response()->json([
            "rol"=>$rol
        ],200);
    }

    public function update(Request $request, string $id)
    {
        //validacion de los datos
        $request->validate([
            'user_id'=>['required','numeric'],
            'rol'=>['required','string']
        ]);
        //buscar al registro a actualizar
        $rol = Rol::find($id);
        //actualizamos el registro
        $rol->update([
            'user_id'=>$request->input('user_id'),
            'rol'=>$request->input('rol'),
        ]);
        //retornamos un mensaje y el registro
        return response()->json([
            "mensaje"=>"Registro actualizado",
            "rol"=>$rol,
        ]);
    }

    public function destroy(string $id)
    {
        $rol = Rol::find($id);
        $rol->delete();
        return response()->json([
            "mensaje"=>"Registro eliminado",
            "rol"=>$rol,
        ],200);
    }
}
