<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Publicidad;
class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes, 200);

    }
    public function create()
    {

    }

    public function store(Request $request)
    {

        define('UPLOAD_DIR', 'storage/');
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = '../../'.UPLOAD_DIR . uniqid() . '.png';
        file_put_contents($file, $image_base64);

        $cliente = new Cliente;

        $cliente->empresa = $request->empresa;
        $cliente->colonia = $request->colonia;
        $cliente->direccion = $request->direccion;    
        $cliente->establecimiento = $request->establecimiento;
        $cliente->estado = $request->estado;
        $cliente->rfc = $request->rfc;
        $cliente->correo = $request->correo;
        $cliente->phone = $request->telefono;
        $cliente->responsable = $request->responsable;
        $cliente->imagen = $file;
        
        $cliente->save();

        return response()->json([
            'respuesta' => 'Se ha agregado un nuevo Cliente',
        ], 200);
  
    }


    public function show($id)
    {
        $cliente = Cliente::find($id);
        return response()->json($cliente, 200);
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        Cliente::where('id', $id)
        ->update([
            'empresa' => $request->empresa,
            'colonia' => $request->colonia,
            'direccion'=> $request->direccion,
            'establecimiento' =>  $request->establecimiento,
            'estado' => $request->estado,
            'rfc' => $request->rfc,
            'correo' => $request->correo,
            'phone' => $request->phone,
            'responsable' => $request->responsable, 
        ]);

        return response()->json([
            'respuesta' => 'Se ha actualizado el Cliente '. $request->empresa
        ]);
    }


    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->publicidads()->delete();
        $cliente->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado el registro del cliente'
            ], 200);

    }
}
