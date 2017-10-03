<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:usuarioCliente-api');
    }
    
    public function login(Request $request)
    {
         // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

        return response()->json([
            'respuesta' => $request->email,
            'password' => $request->password
            ], 200);

    // Attempt to log the user in
      if (Auth::guard('administrator')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('administrator.dashboard'));
      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }


}
