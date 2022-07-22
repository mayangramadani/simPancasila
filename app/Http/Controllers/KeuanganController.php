<?php

namespace App\Http\Controllers;

use App\Models\KategoriKeuangan;
use App\Models\Keuangan;
use App\Models\Saldo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KeuanganController extends Controller
{
    //
    public function index()
    {
        $keuangan = Keuangan::get();
        $saldo = Saldo::all();
        $KategoriKeuangan = KategoriKeuangan::all();
        return view('datakeuangan.index', compact('keuangan', 'saldo', 'KategoriKeuangan'));
    }
    public function add(Request $request)
    {
        if ($request->bukti_transaksi != null) {
            $file = $request->bukti_transaksi;
            // dd($file);
            $extension = $file->extension();
            $date = date("his");
            // dd($extension);
            $file_name1 = "Foto_$date.$extension";
            $path = $request->file('bukti_transaksi')->storeAs('public/Keuangan/bukti', $file_name1);
        } else {
            $file_name1 = null;
        }
        $KategoriKeuangan = KategoriKeuangan::find($request->kategori_keuangan_id);
        $Saldo = Saldo::find($request->saldo_id);
        dd($request->saldo_id);
        if ($KategoriKeuangan->kategori_keuangan == 'pemasukan') {
            Saldo::create([
                'debit' => $request->jumlah,
                'saldo' => $Saldo->saldo + $request->jumlah
            ]);
        }
        Keuangan::create([
            'nama_keuangan' => $request->nama_keuangan,
            'saldo_id' => $request->saldo_id,
            'kategori_keuangan_id' => $request->kategori_keuangan_id,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'users_id' => Auth::user()->id,
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
