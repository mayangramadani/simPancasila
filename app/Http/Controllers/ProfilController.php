<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $siswa = User::where('id', Auth::user()->id)->first();
        return view('profil',compact('siswa'));
    }
    public function editprofile(Request $request)
    {
        $profil = User::find(Auth::user()->id);
        if ($request->has("foto")) {
            $date = date("his");
            $extension = $request->file('foto')->extension();
            $file_name = "profil_$date.$extension";
            $path = $request->file('foto')->storeAs('public/Profil', $file_name);
            $profil->foto = $file_name;
        }
        $profil->name = $request->name;
        $profil->save();

        $profil = User::updateOrCreate(
            ['users_id' => Auth::user()->id],
            [
                'alamat' => $request->alamat,
                'foto' => $file_name,
                'no_hp' => $request->no_hp,
            ]
        );

        return back()->with('success', 'Profile Berhasil Diedit');
    }

    public function profile()
    {
        // dd('saas');
        $user = User::find(Auth::user()->id);
        $siswa = Siswa::where('users_id', $user->id)->first();
        return view('profil', compact('user', 'siswa'));
    }
}
