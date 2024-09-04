<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use Illuminate\Http\Request;

class PostulanteController extends Controller
{
    public function index()
    {
        $postulantes = Postulante::all();
        return response()->json([
            "postulantes"=>$postulantes
        ],200);
    }

    public function store(Request $request)
    {
        //validamos la informacion
        $request->validate([
            'user_id'=>['required'],
            'carnet'=>['required','string'],
            'nombre'=>['required','string'],
            'genero'=>['required','string'],
            'fecha_nacimiento'=>['required','date'],
            'correo'=>['required','unique:postulantes','email:rfc,dns'],
            'fecha_pago'=>['required','date'],
        ]);
        //Almacenamos toda la información en la BD
        $postulante = Postulante::create([
            'user_id'=>$request->input('user_id'),
            'carnet'=>$request->input('carnet'),
            'nombre'=>$request->input('nombre'),
            'genero'=>$request->input('genero'),
            'fecha_nacimiento'=>$request->input('fecha_nacimiento'),
            'correo'=>$request->input('correo'),
            'fecha_pago'=>$request->input('fecha_pago'),
        ]);
        return response()->json(["message"=>"Registro exitoso"],200);
    }

    public function store_img(Request $request, string $id){
        $request->validate([
            'imagen'=>['required','image','mimes:jpeg,png,jpg,gif','max:2048'],
        ]);
        //almacenamos la imagen en el directorio: 'public/images'
        $postulante = Postulante::find($id);
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = $postulante->user_id. '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            // Obtenemos la URL relativa de la imagen
            $imageUrl = 'images/' . $imageName;
        }else{
            $imageUrl = '';
        }
        //Almacenamos toda la información en la BD
        $postulante->update([
            'imagen'=>$imageUrl,
        ]);
        return response()->json(["message"=>"Registro exitoso"],200);
    }

    public function show(Postulante $postulante)
    {
        $postulante = Postulante::find($postulante->id);
        return response()->json($postulante,200);
    }

    public function update(Request $request, string $id)
    {
        //validamos la informacion
        $request->validate([
            'user_id'=>['required'],
            'carnet'=>['required','string'],
            'nombre'=>['required','string'],
            'genero'=>['required','string'],
            'fecha_nacimiento'=>['required','date'],
            'correo'=>['required'],
            'fecha_pago'=>['required','date'],
        ]);
        //buscamos al postulante
        $post = Postulante::find($id);
        //actualizamos la informacion del postulante
        $post->update([
            'user_id'=>$request->input('user_id'),
            'carnet'=>$request->input('carnet'),
            'nombre'=>$request->input('nombre'),
            'genero'=>$request->input('genero'),
            'fecha_nacimiento'=>$request->input('fecha_nacimiento'),
            'correo'=>$request->input('correo'),
            'fecha_pago'=>$request->input('fecha_pago'),
        ]);
        return response()->json(["message"=>"Registro actualizado"],200);
    }

    public function destroy(string $id)
    {
        $postulante = Postulante::find($id);
        // Ruta del archivo
        $ruta = public_path($postulante->imagen);
        // Verifica si el archivo existe y luego elimínalo
        if (file_exists($ruta)) {
            unlink($ruta);   
        }
        $postulante->delete();
        return response()->json(["message"=>"Se ha eliminado correctamente"],200);
    }
}
