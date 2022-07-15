<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Saldo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KeuanganController extends Controller
{
    //
    public function index()
    {
        $keuangan = Keuangan::get();
        $saldo = Saldo::all();
        return view('datakeuangan.index', compact('keuangan', 'saldo'));
    }
    public function add(Request $request)
    {
        $file = $request->bukti_keuangan;
        // dd($file);
        $extension = $file->extension();
        $date = date("his");
        // dd($extension);
        $file_name1 = "Foto_$date.$extension";
        $path = $request->file('bukti_keuangan')->storeAs('public/Keuangan/bukti', $file_name1);

        Keuangan::create([
            'nama_keuangan' => $request->jenis_keuangan,
            'jenis_keuangan' => $request->jenis_keuangan,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'bukti' => $file_name1,

        ]);
        return redirect('/datakeuangan');
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
        // dd($request->foto);
        $keuangan = Keuangan::find($id);
        $keuangan->nama_keuangan = $request->nama_keuangan;
        $keuangan->jenis_keuangan = $request->jenis_keuangan;
        $keuangan->jumlah = $request->jumlah;
        $keuangan->tanggal = $request->tanggal;
        $keuangan->deskripsi = $request->deskripsi;


        if ($request->bukti_keuangan != null) {

            Storage::delete("public/Keuangan/bukti/$keuangan->bukti_keuangan");

            $date = date("his");
            $file = $request->bukti_keuangan;
            $extension = $file->extension();
            // dd($extension);
            $file_name1 = "Foto$date.$extension";
            $path = $request->file('bukti_keuangan')->storeAs('public/Keuangan/bukti', $file_name1);

            $keuangan->bukti_keuangan = $file_name1;
        }
        $keuangan->save();

        return redirect('/datakeuangan');
    }
    public function hapus($id)
    {
        $keuangan = Keuangan::find($id);
        $keuangan->delete();
        return redirect('/datakeuangan');
    }
    public function getkeuangan($id)
    {
        $keuangan = Keuangan::find($id);
        return $keuangan;
    }
}
