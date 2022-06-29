<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $file = $request->bukti_transaksi;
        // dd($file);
        $extension = $file->extension();
        $date = date("his");
        // dd($extension);
        $file_name1 = "Foto_$date.$extension";
        $path = $request->file('bukti_transaksi')->storeAs('public/Keuangan/bukti', $file_name1);

        Keuangan::create([
            'jenis_transaksi' => $request->jenis_transaksi,
            'jumlah_transaksi' => $request->jumlah_transaksi,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'bukti_transaksi' => $file_name1,

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
        $keuangan->jenis_transaksi = $request->jenis_transaksi;
        $keuangan->jumlah_transaksi = $request->jumlah_transaksi;
        $keuangan->tanggal = $request->tanggal;
        $keuangan->keterangan = $request->keterangan;


        if ($request->bukti_transaksi != null) {

            Storage::delete("public/Keuangan/bukti/$keuangan->bukti_transaksi");

            $date = date("his");
            $file = $request->bukti_transaksi;
            $extension = $file->extension();
            // dd($extension);
            $file_name1 = "Foto$date.$extension";
            $path = $request->file('bukti_transaksi')->storeAs('public/Keuangan/bukti', $file_name1);

            $keuangan->bukti_transaksi = $file_name1;
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
