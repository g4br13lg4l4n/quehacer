<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes, 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        
        $cliente->save();

        return response()->json([
            'respuesta' => 'Se ha agregado un nuevo Cliente',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        return response()->json($cliente, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::find($id)->delete();
        return response()->json([
            'respuesta' => 'Se ha eliminado el registro del cliente'
            ], 200);

    }
}
