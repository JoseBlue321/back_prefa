<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        //$users = User::all();
        $users = DB::select('select id,name,email,password from users');
        return response()->json([
            "users" => $users
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string'],
            'email'=>['required','unique:users','email:rfc,dns'],
            'password'=>['required','string','min:3'],
        ]);
        $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
        ]);
        return response()->json([
            "message" => "Registro Exitoso",
            "user" => $user->name
        ]);
    }

    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>['required','string'],
            'email'=>['required','string','email'],
            'password'=>['required','string','min:3'],
        ]);
        $user = User::find($id);
        $user->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
        ]);
        return response()->json(["message"=>"Registro actualizado"],200);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(["message"=>"Registro eliminado"],200);
    }

    public function store_roles(Request $request, string $id){
        $user = User::find($id);
        $user->roles()->attach($request->input('roles'));
        return response()->json([
            "message"=>"Registro exito",
        ]);
    }
}
