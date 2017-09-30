<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
class CategoriasController extends Controller
{

    public function index()
    {
        $categoria = Categoria::all();
        return response()->json($categoria, 200);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $categoria = new Categoria;

        $categoria->name = $request->categoria;
        $categoria->save();

        return response()->json([
            'respuesta' => 'Se ah agregado la nueva Categoría',
        ], 200);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $cliente = Categoria::find($id);
        $cliente->publicidads()->delete();
        $cliente->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado el registro del cliente'
            ], 200);
    }
}
