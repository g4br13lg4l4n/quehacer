<?php

namespace App\Http\Controllers\Auth;

use App\SocialProfiles;
use Illuminate\Http\Request;
use Auth;

class SocialProfilesController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:SocialProfiles');
    }
}
