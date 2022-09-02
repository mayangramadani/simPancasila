<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriPembayaran;

class KategoriPembayaranController extends Controller
{
    public function index()
    {
        $kategoripembayaran = KategoriPembayaran::get();
        return view('kategoripembayaran.index', compact('kategoripembayaran'));
    }
    public function getIndex()
    {
        $data['page_title'] = 'Kategori Pembayaran';
        $data['kategoripembayaran'] = KategoriPembayaran::all();

        foreach ($data['data'] as $key => $row) {
            $row->total = KategoriPembayaran::where('', $row->id)->count();
        }

        return view('', $data);
    }
    public function add(Request $request)
    {
        KategoriPembayaran::create($request->except(['_token', 'submit']));
        return redirect('/kategoripembayaran');

        KategoriPembayaran::create([
            'nama_pembayaran' => $request->nama_pembayaran,
            'deskripsi_pembayaran' => $request->deskripsi_pembayaran,
            'harga' => $request->harga,
      
        ]);
        return redirect('kategoripembayaran');
    }
    public function hapus($id)
    {
        $KategoriPembayaran = KategoriPembayaran::find($id);
        $KategoriPembayaran->delete();
        return redirect('/kategoripembayaran')->with('success', 'Data Berhasil Dihapus');;
    }
    public function edit($id)
    {
        $kategoripembayaran = KategoriPembayaran::find($id);
        return view('kategoripembayaran.edit', compact('kategoripembayaran'));
    }
    public function update($id, Request $request)
    {
        $KategoriPembayaran = KategoriPembayaran::find($id);
        $KategoriPembayaran->update($request->except(['_token', 'submit']));
        return redirect('/kategoripembayaran');
    }
}
