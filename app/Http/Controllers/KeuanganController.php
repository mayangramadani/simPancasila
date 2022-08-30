<?php

namespace App\Http\Controllers;

use App\Models\KategoriKeuangan;
use App\Models\Keuangan;
use App\Models\Saldo;
use App\Models\Sekolah;
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
        $sekolah = Sekolah::all();
        $kategorikeuangan = KategoriKeuangan::all();
        return view('datakeuangan.index', compact('keuangan', 'saldo', 'kategorikeuangan', 'sekolah'));
    }
    public function add(Request $request)
    {

        if ($request->bukti_transaksi != null) {
            $file = $request->bukti_transaksi;
            $extension = $file->extension();
            $date = date("his");
            $file_name1 = "Foto_$date.$extension";
            $path = $request->file('bukti_transaksi')->storeAs('public/Keuangan/bukti', $file_name1);
        } else {
            $file_name1 = null;
        }
        $kategorikeuangan = KategoriKeuangan::find($request->kategori_keuangan_id);
        $Saldo = Saldo::where('sekolah_id', $request->sekolah_id)->latest()->first();

        $Keuangans = Keuangan::create([
            'nama_keuangan' => $request->nama_keuangan,
            'kategori_keuangan_id' => $request->kategori_keuangan_id,
            'jumlah' => $this->convertRP($request->jumlah),
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'users_id' => Auth::user()->id,
            'bukti' => $file_name1,

        ]);
        if ($Saldo != null) {
            $cekSaldo = $Saldo->saldo;
        } else {
            $cekSaldo = 0;
        }
        if ($kategorikeuangan->kategori_keuangan == 'pemasukan') {
            Saldo::create([
                'debit' => $this->convertRP($request->jumlah),
                'saldo' => (int)$cekSaldo + (int)$this->convertRP($request->jumlah),
                'sekolah_id' => $request->sekolah_id,
                'keuangan_id' => $Keuangans->id
            ]);
        } else {
            Saldo::create([
                'kredit' => $request->jumlah,
                'saldo' => (int)$cekSaldo - (int)$this->convertRP($request->jumlah),
                'sekolah_id' => $request->sekolah_id,
                'keuangan_id' => $Keuangans->id
            ]);
        }
        return redirect('/datakeuangan');
    }

    public function detail($id)
    {
        $keuangan = Keuangan::find($id);
        $sekolah = Sekolah::get();
        return view('datakeuangan.detail', compact('keuangan', 'sekolah'));
    }

    // public function anggaran($id)
    // {
    //     $keuangan = Keuangan::find($id);
    //     return view('datakeuangan.anggaran', compact('keuangan'));
    // }
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
