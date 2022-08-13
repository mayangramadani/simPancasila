<?php

namespace App\Http\Controllers;

use App\Models\AksesKelas;
use App\Models\DataKelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AksesKelasController extends Controller
{
    public function index()
    {
        $siswa = Siswa::get();
        $datakelas = DataKelas::all();
        $akseskelas = AksesKelas::all();
        return view('akseskelas.index', compact('akseskelas', 'siswa', 'datakelas'));
    }
    public function add(Request $request)
    {
        AksesKelas::create($request->except(['_token', 'submit']));
        return redirect('/akseskelas');
        AksesKelas::create([]);
        return redirect('/datakeuangan');
    }
    public function edit($id)
    {
        $siswa = Siswa::all();
        $datakelas = DataKelas::all($id);
        $akseskelas = AksesKelas::all();
        return view('akseskelas.edit', compact('akseskelas', 'siswa', 'datakelas'));
    }
    public function update($id, Request $request)
    {
        $akseskelas = AksesKelas::find($id);
        $akseskelas->update($request->except(['_token', 'submit']));
        return redirect('/akseskelas');
    }
}
