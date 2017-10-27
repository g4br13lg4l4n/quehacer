<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAplication;

class UserAplicationsController extends Controller
{

    public function index()
    {
        $userApp = UserAplication::all();
        return response()->json($userApp, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $userApp = new UserAplication;
        
        $userApp->email = $request->email;
        $userApp->name = $request->name;
        $userApp->age = $request->age;
        $userApp->gender = $request->gender;
        $userApp->locations = $request->locations;

        $userApp->save();

        return response()->json([
            'respuesta' => 'Ha Ingresado un nuevo usuario a la aplicación',
        ], 200);

    }

    public function show($id)
    {
        $userApp = UserAplication::find($id);
        return response()->json($userApp, 200);
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
