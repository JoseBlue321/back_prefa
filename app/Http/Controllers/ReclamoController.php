<?php

namespace App\Http\Controllers;

use App\Models\Reclamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReclamoController extends Controller
{
    public function index()
    {
        $reclamos = Reclamo::all();
        return response()->json([
            'reclamos'=>$reclamos
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'postulante_id'=>['required','numeric'],
            'parcial_id'=>['required','numeric'],
            'reclamo'=>['nullable','string'],
            'abogado'=>['nullable','boolean'],
            'carta'=>['required','mimes:pdf'],
        ]);
        //obtenemos el archivo pdf (carta)
        $carta = $request->file('carta');
        // Definir el nombre único del archivo
        $nombrepdf = $request->postulante_id . '_' . time() . '.pdf';
        // Guardar el archivo en la carpeta 'reclamos' dentro de 'storage/app/public'
        $ruta = $carta->storeAs('public/reclamos/'.$request->input('parcial_id'), $nombrepdf);

        $reclamo = Reclamo::create([
            'postulante_id'=>$request->input('postulante_id'),
            'parcial_id'=>$request->input('parcial_id'),
            'reclamo'=>$request->input('reclamo'),
            'abogado'=>$request->input('abogado'),
            'carta'=>$ruta,
        ]);
        return response()->json([
            'message'=>'Registro exitoso',
            'reclamo'=>$reclamo
        ]);
    }

    public function show(string $id)
    {
        $reclamo = Reclamo::find($id);
        return response()->json([
            'reclamo'=>$reclamo
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'postulante_id'=>['required','numeric'],
            'parcial_id'=>['required','numeric'],
            'reclamo'=>['nullable','string'],
            'abogado'=>['nullable','boolean'],
            'carta'=>['required','mimes:pdf','max:10000'],
        ]);

        $reclamo = Reclamo::findOrFail($id);

        //obtenemos el archivo pdf (carta)
        $carta = $request->file('carta');
        // Definir el nombre único del archivo
        $nombrepdf = $request->postulante_id . '_' . time() . '.pdf';
        // Guardar el archivo en la carpeta 'reclamos' dentro de 'storage/app/public'
        $ruta = $carta->storeAs('public/reclamos/'.$request->input('parcial_id'), $nombrepdf);
        // Actualizamos los cambios en la base de datos
        $reclamo->update([
            'postulante_id'=>$request->input('postulante_id'),
            'parcial_id'=>$request->input('parcial_id'),
            'reclamo'=>$request->input('reclamo'),
            'abogado'=>$request->input('abogado'),
            'carta'=>$ruta,
        ]);
        return response()->json([
            'message'=>'Registro acutualizado',
            'reclamo'=>$reclamo
        ]);
    }

    public function destroy(string $id)
    {
        $reclamo = Reclamo::findOrFail($id);
        // Asegúrate de que el archivo exista antes de intentar eliminarlo
        if (Storage::exists($reclamo->carta)) {
            // Eliminar el archivo
            Storage::delete($reclamo->carta);
        } 
        $reclamo->delete();
        return response()->json([
            'message'=>'Registro eliminado',
            'reclamo'=>$reclamo
        ]);
    }
}
