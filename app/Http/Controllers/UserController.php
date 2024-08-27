<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users,200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string'],
            'email'=>['required','string','email','unique:users'],
            'password'=>['required','string','min:3'],
        ]);
        $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
        ]);
        return response()->json(["mensaje"=>"Registro Exitoso"],200);
    }

    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json($user,200);
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
        return response()->json(["mensaje"=>"Update Exitoso"],200);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(["mensaje"=>"Se elimino el Registro"],200);
    }
}
