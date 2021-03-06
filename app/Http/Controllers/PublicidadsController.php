<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicidad;
use App\Cliente;
use App\Picture;
class PublicidadsController extends Controller
{
    public function index()
    {
        $publicidad = Publicidad::with('cliente', 'categoria', 'pictures')->get();
        return response()->json($publicidad, 200);
    }

    public function getPublicidadChart($id)
    {  
        $publicidadChart = Publicidad::with('userAplications')->find($id);
        return response()->json($publicidadChart, 200);
    }


    public function store(Request $request)
    {
        $pictureArray = [];
        define('UPLOAD_DIR', 'public/storage/uploads/');
        foreach ($request->images as $image) {
            $image_parts = explode(";base64,", $image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = '../'.UPLOAD_DIR . uniqid() . '.png';
            file_put_contents($file, $image_base64);
            $explde_file = explode("public/", $file);
            $file2 = '../'.$explde_file[0].$explde_file[1];
            array_push($pictureArray, $file2); 
        }
        $publicidad = new Publicidad;

        $request->aireAcondicionado ? $clima = 1 : $clima = 0;
        $request->estacionamiento ? $estacionamiento = 1 : $estacionamiento = 0;
        $request->servicioDomicilio ? $servicioDomicilio = 1 : $servicioDomicilio = 0;
        $request->wifi ? $wifi = 1 : $wifi = 0;
        $request->bar ? $bar = 1 : $bar = 0;
        $request->musica ? $musica = 1 : $musica = 0;
 
        $publicidad->name = $request->name;
        $publicidad->cliente_id = $request->empresa;
        $publicidad->resena = $request->rEstablecimento;
        $publicidad->ubicacion = $request->ubicacion;
        $publicidad->idioma = $request->idioma;
        $publicidad->mapaLat = $request->mapaLat;
        $publicidad->mapaLng = $request->mapaLng;
        $publicidad->costo = $request->precios;
        $publicidad->oferta = $request->oferta;
        $publicidad->horario = $request->horarios;
        $publicidad->telefono = $request->telefono;
        $publicidad->correo = $request->correo;
        $publicidad->status = 1;
        $publicidad->clima = $clima;
        $publicidad->estacionamiento = $estacionamiento;
        $publicidad->domicilio = $servicioDomicilio;
        $publicidad->wifi = $wifi;
        $publicidad->bar = $bar;
        $publicidad->musica = $musica;
        $publicidad->categoria_id = $request->categoria;
        $publicidad->save();

        foreach ($pictureArray as $value) {
            $picture = new Picture;
            $picture->url = $value;
            $picture->publicidad_id = $publicidad->id;   
            $picture->save();
        }

        return response()->json([
            'respuesta' => 'Se ha agregado la nueva Publicidad',
        ], 200);
        
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
        $publicidad = Publicidad::with('cliente', 'categoria', 'pictures')->find($id);
        return response()->json($publicidad, 200);
    }

    public function update(Request $request, $id)
    {

        $request->aireAcondicionado ? $clima = 1 : $clima = 0;
        $request->estacionamiento ? $estacionamiento = 1 : $estacionamiento = 0;
        $request->servicioDomicilio ? $servicioDomicilio = 1 : $servicioDomicilio = 0;
        $request->wifi ? $wifi = 1 : $wifi = 0;
        $request->bar ? $bar = 1 : $bar = 0;
        $request->musica ? $musica = 1 : $musica = 0;

        Publicidad::where('id', $id)
        ->update([
            'cliente_id' => $request->cliente_id,
            'resena' => $request->resena,
            'ubicacion'=> $request->ubicacion,
            'costo' =>  $request->costo,
            'oferta' => $request->oferta,
            'horario' => $request->horario,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'status' => 1,
            'clima' => $clima,
            'estacionamiento' => $estacionamiento,
            'domicilio' => $servicioDomicilio, 
            'wifi' => $wifi,
            'bar' => $bar,
            'musica' => $musica,
            'categoria_id' => $request->categoria_id
        ]);

        return response()->json([
            'respuesta' => 'Se ha actualizado la publicidad'
        ]);
    }

    public function getPublicidadForCategory($id)
    {
        $publicidad = Publicidad::where('categoria_id', $id)->with('cliente', 'categoria')->get();
        return response()->json($publicidad, 200);
    }
}
