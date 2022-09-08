<?php

namespace App\Http\Controllers;

use App\Models\KategoriKeuangan;
use App\Models\Keuangan;
use Illuminate\Http\Request;

class KategoriKeuanganController extends Controller
{
    //
    public function index()
    {
        $kategorikeuangan = KategoriKeuangan::get();
        $datakeuangan = Keuangan::all();
        return view('kategorikeuangan.index', compact('kategorikeuangan', 'datakeuangan'));
    }
    public function getIndex()
    {
        $data['page_title'] = 'Kategori Keuangan';
        $data['data'] = KategoriKeuangan::all();
    }
    public function add(Request $request)
    {
        // KategoriKeuangan::create($request->except(['_token', 'submit']));
        // return redirect('/kategorikeuangan');

        KategoriKeuangan::create([
            'nama_keuangan' => $request->nama_keuangan,
            'deskripsi' => $request->deskripsi,
            'kategori_keuangan' => $request->kategori_keuangan,
        ]);
        return back()->with('success', 'Data Berhasil Ditambah');
    }
    public function hapus($id)
    {
        $kategorikeuangan = KategoriKeuangan::find($id);
        $kategorikeuangan->delete();
        return redirect('kategorikeuangan')->with('success', 'Data Berhasil Dihapus');;
    }
    public function edit($id)
    {
        $kategorikeuangan = KategoriKeuangan::find($id);
        $datakeuangan = Keuangan::all();
        return view('kategorikeuangan.edit', compact('kategorikeuangan', 'datakeuangan'));
    }
    public function update($id, Request $request)
    {
        $kategorikeuangan = kategorikeuangan::find($id);
        $kategorikeuangan->update($request->except(['_token', 'submit']));
        return redirect('/kategorikeuangan');
    }
}
