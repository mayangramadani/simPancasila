<?php

namespace App\Http\Controllers;

use App\Models\DataKelas;
use Illuminate\Http\Request;

class DataKelasController extends Controller
{
    //
    public function index()
    {
        $datakelas = DataKelas::get();
        return view('datakelas', compact('datakelas'));
    }
    public function add(Request $request)
    {
        DataKelas::create($request->except(['_token', 'submit']));
        return redirect('/datakelas');
    }
    public function hapus($id)
    {
        $datakelas = DataKelas::find($id);
        $datakelas->delete();
        return redirect('/datakelas');
    }
    public function edit($id)
    {
        $datakelas = DataKelas::find($id);
        return view('datakelas.edit', compact('datakelas'));
    }
    public function update($id, Request $request) {
        $datakelas=DataKelas::find($id);
        $datakelas->update($request->except(['_token', 'submit']));
        return redirect('/datakelas');
    } 
}

