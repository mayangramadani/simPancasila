<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    //
    public function index()
    {
        $keuangan = Keuangan::get();
        return view('datakeuangan.index', compact('keuangan'));
    }
    public function add(Request $request)
    {
        Keuangan::create($request->except(['_token', 'submit']));
        return redirect('/datakeuangan');
    }
    public function create()
    {
        return view('datakeuangan.create');
    }
    public function detail($id)
    {
        $keuangan = Keuangan::find($id);
        return view('datakeuangan.detail', compact('keuangan'));
    }
    public function edit($id)
    {
        $keuangan = Keuangan::find($id);
        return view('datakeuangan.edit', compact('keuangan'));
    }
    public function update($id, Request $request)
    {
        $keuangan = Keuangan::find($id);
        $keuangan->update($request->except(['_token', 'submit']));
        return redirect('/datakeuangan');
    }
    public function hapus($id)
    {
        $keuangan = Keuangan::find($id);
        $keuangan->delete();
        return redirect('/datakeuangan');
    }
}
