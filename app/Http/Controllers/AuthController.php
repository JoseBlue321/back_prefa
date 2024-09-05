<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //agregamos el metodo Auth

class AuthController extends Controller
{
    public function login(Request $request){
        //validamos las credenciales
        $credenciales = $request->validate([
            'email'=>['required','email:rfc,dns','exists:users,email'],
            'password'=>['required','string','min:3'],
        ]); 
        //verificamos que las credenciales sean correctas, caso contrario respondemos "credenciales incorrectas"
        if(!Auth::attempt($credenciales)){
            return response()->json([
                "message"=>"Credenciales incorrectas"            
            ],401);
        }
        //Si pasa los niveles de seguridad entonces ingresa al sistema
        //optenemos al usuario logueado
        $user = $request->user();
        //creamos el Token de acceso
        $token = $user->createToken($user->name)->plainTextToken;
        //retornamos el token de acceso
        return response()->json([
            "access_token"=>$token,
            "user"=>$user
        ],201); 
    }

    public function registro(Request $request){
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

    public function perfil(Request $request){
        return response()->json([
            "user"=>$request->user()
        ],200);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json([
            "message"=>"salio"
        ],200);
    }
}
