<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::get();
        return view('sekolah.index', compact('sekolah'));
    }

    
    public function add(Request $request)
    {
        Sekolah::create($request->except(['_token', 'submit']));
        return redirect('/sekolah');

        Sekolah::create([
            'nama_sekolah' => $request->nama_sekolah,
            'derajat' => $request->derajat,
            'lokasi' => $request->lokasi,
            'spp' => $request->spp,
    
        ]);
        return redirect('sekolah');
    }
    public function hapus($id)
    {
        $sekolah = Sekolah::find($id);
        $sekolah->delete();
        return redirect('/sekolah');
    }
    public function edit($id)
    {
        $sekolah = Sekolah::find($id);
        return view('sekolah.edit', compact('sekolah'));
    }
    public function update($id, Request $request)
    {
        $sekolah = Sekolah::find($id);
        $sekolah->update($request->except(['_token', 'submit']));
        return redirect('/sekolah');
    }
}
