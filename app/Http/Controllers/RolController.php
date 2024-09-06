<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::all();
        return response()->json([
            'roles'=>$roles,
        ]);
    }

    public function store(Request $request)
    {
        //validacion de los datos
        $request->validate([
            'rol'=>['required','string'],
            'descripcion'=>['nullable','string']
        ]);
        //registro a la base de datos
        $rol = Rol::create([
            'rol'=>$request->input('rol'),
            'descripcion'=>$request->input('descripcion')
        ]);
        //devolvemos un mensaje y la informacion del rol
        return response()->json([
            "message"=>"Registro exitoso",
            "rol"=>$rol
        ]);
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
            'rol'=>['required','string'],
            'descripcion'=>['nullable','string']
        ]);
        //buscar al registro a actualizar
        $rol = Rol::find($id);
        //actualizamos el registro
        $rol->update([
            'rol'=>$request->input('rol'),
            'descripcion'=>$request->input('descripcion')
        ]);
        //retornamos un mensaje y el registro
        return response()->json([
            "message"=>"Registro actualizado",
            "rol"=>$rol,
        ]);
    }

    public function destroy(string $id)
    {
        $rol = Rol::find($id);
        $rol->delete();
        return response()->json([
            "message"=>"Registro eliminado",
            "rol"=>$rol,
        ],200);
    }

    public function store_permisos(Request $request, string $id){
        $rol = Rol::find($id);
        $rol->permisos()->attach($request->input('permisos'));
        return response()->json([
            "message"=>"Registro exito",
        ]);
    }
}
