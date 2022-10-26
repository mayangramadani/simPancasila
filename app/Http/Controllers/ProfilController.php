<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profile::where('users_id', Auth::user()->id)->first();
            return view('profil');
        
    }
}
