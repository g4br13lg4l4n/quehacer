<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicidad;
class PublicidadsController extends Controller
{
    public function index()
    {
        $publicidad = Publicidad::all();
    //    $cliente = Publicidad::find($publicidad->id)

        return response()->json($publicidad, 200);

    }

    public function store(Request $request)
    {
        $publicidad = new Publicidad;


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

        //$publicidad->save();

        return response()->json([
            'respuesta' => 'Se ah agregado la nueva Publicidad',
        ], 200);
    }
}
