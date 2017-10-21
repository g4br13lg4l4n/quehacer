<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicidad;
use App\Cliente;
class PublicidadsController extends Controller
{
    public function index()
    {
        $publicidad = Publicidad::with('cliente', 'categoria')->get();
        return response()->json($publicidad, 200);
    }

    public function store(Request $request)
    {

       $images = $request->images;

        for ($i=0; $i < count($images); $i++) { 
            print_r($images[$i]);
        }

/*
        foreach ($images as $clave => $valor) {
            print_r($valor);
        }
*/
    /*    
        $publicidad = new Publicidad;

        $archivo = $request->file('image');



        $request->aireAcondicionado ? $clima = 1 : $clima = 0;
        $request->estacionamiento ? $estacionamiento = 1 : $estacionamiento = 0;
        $request->servicioDomicilio ? $servicioDomicilio = 1 : $servicioDomicilio = 0;
 

        $publicidad->cliente_id = $request->empresa;
        $publicidad->resena = $request->rEstablecimento;
        $publicidad->ubicacion = $request->ubicacion;
        $publicidad->costo = $request->precios;
        $publicidad->horario = $request->horarios;
        $publicidad->telefono = $request->telefono;
        $publicidad->correo = $request->correo;
        $publicidad->status = 1;
        $publicidad->clima = $clima;
        $publicidad->estacionamiento = $estacionamiento;
        $publicidad->domicilio = $servicioDomicilio;
        $publicidad->categoria_id = $request->categoria;

        $publicidad->save();

        return response()->json([
            'respuesta' => 'Se ah agregado la nueva Publicidad',
        ], 200);
        */
    }

    public function destroy($id)
    {
        $publicidad = Publicidad::find($id)->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado el registro de publicidad'
            ], 200);
    }

    public function show($id)
    {
        $publicidad = Publicidad::with('cliente', 'categoria')->find($id);
        return response()->json($publicidad, 200);
    }

    public function update(Request $request, $id)
    {
        $request->clima ? $clima = 1 : $clima = 0;
        $request->estacionamiento ? $estacionamiento = 1 : $estacionamiento = 0;
        $request->domicilio ? $servicioDomicilio = 1 : $servicioDomicilio = 0;

        Publicidad::where('id', $id)
        ->update([
            'cliente_id' => $request->cliente_id,
            'resena' => $request->resena,
            'ubicacion'=> $request->ubicacion,
            'costo' =>  $request->costo,
            'horario' => $request->horario,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'status' => 1,
            'clima' => $clima,
            'estacionamiento' => $estacionamiento,
            'domicilio' => $servicioDomicilio, 
            'categoria_id' => $request->categoria_id
        ]);

        return response()->json([
            'respuesta' => 'Se ha actualizado la publicidad'
        ]);
    }
}
