<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sugerencia;
class SugerenciasController extends Controller
{
     public function index()
    {
        $sugerencia = Sugerencia::all();
        return response()->json($sugerencia , 200);
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {
        $sugerencia = New Sugerencia;

        $sugerencia->asunto = $request->asunto;
        $sugerencia->mensaje = $request->mensaje;
        $sugerencia->save();
        
        return response()->json([
            'respuesta' => 'Se ha registrado su sugerencia'
        ], 200);
        
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {
        $sugerencia = Sugerencia::find($id)->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado el comentario'
        ], 200);
    }
}
