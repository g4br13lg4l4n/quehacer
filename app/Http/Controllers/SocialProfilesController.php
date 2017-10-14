<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use App\SocialProfiles;
use Illuminate\Http\Request;
use Auth;
use Socialite;

class SocialProfilesController extends Controller
{
  
    public function __construct()
    {
      $this->middleware('guest:usuarioCliente-api');
    }

    public function facebook()
    {
      return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
      $user = Socialite::driver('facebook')->user();
      return response()->json($user, 200);
    }

}
