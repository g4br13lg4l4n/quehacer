<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PublicidadInterest;
class PublicidadInterestsController extends Controller
{
    public function index()
    {
        $pubInterest = PublicidadInterest::with('publicidad')->get();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $pubInterest = new PublicidadInterest;

        $pubInterest->user_aplication_id = $request->user_aplication_id;
        $pubInterest->publicidad_id = $request->publicidad_id;

        $pubInterest->save();

        return response()->json([
            'respuesta' => 'Se ha registrado una nueva visita',
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
        //
    }
}
