<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class KonfirmasiController extends Controller
{
    public function index()
    {
        $konfirmasi = Keuangan::where('status_pembayaran', 'Proses')->get();
        $history = Keuangan::where('status_pembayaran', '!=', 'Proses')
            ->where('status_pembayaran', '!=', 'Belum Dibayar')->get();
        return view('konfirmasi.index', compact('konfirmasi', 'history'));
    }
    public function show($id)
    {
        $konfirmasi = Keuangan::find($id);
        return view('konfirmasi.show', compact('konfirmasi'));
    }
    public function approve($id)
    {
        $konfirmasi = Keuangan::find($id);
        return view('konfirmasi.show', compact('konfirmasi'));
    }
    public function update($id, Request $request)
    {
        $konfirmasi = Keuangan::find($id);
        $konfirmasi->status_pembayaran = $request->status_pembayaran;
        $konfirmasi->save();
        return redirect('/konfirmasi');
    }
}
