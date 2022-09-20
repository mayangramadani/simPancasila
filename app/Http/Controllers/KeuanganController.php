<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\KategoriKeuangan;
use App\Models\Keuangan;
use App\Models\Saldo;
use App\Models\Sekolah;
use App\Models\SumberDana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KeuanganController extends Controller
{
    //
    public function index()
    {
dd();
        $keuangan = Keuangan::get();
        $saldo = Saldo::all();
        $sekolah = Sekolah::all();
        $kategorikeuangan = KategoriKeuangan::all();
        $sumberdana = SumberDana::all();
        return view('datakeuangan.index', compact('keuangan', 'saldo', 'kategorikeuangan', 'sekolah', 'sumberdana'));
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
            'no_transaksi' => Str::random(9),
            'nama_keuangan' => $request->nama_keuangan,
            'kategori_keuangan_id' => $request->kategori_keuangan_id,
            'jumlah' => $this->convertRP($request->jumlah),
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'sumber_dana' => $request->sumber_dana,
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
        $keuangan->jumlah = $this->convertRP($request->jumlah);
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
        return redirect('/datakeuangan')->with('success', 'Data Berhasil Dihapus');
    }
    public function getkeuangan($id)
    {
        $keuangan = Keuangan::find($id);
        return $keuangan;
    }
    public function rkas(Request $request)
    {

        if ($request->berkas_pendukung != null) {
            $file = $request->berkas_pendukung;
            $extension = $file->extension();
            $date = date("his");
            $file_name1 = "Foto_$date.$extension";
            $path = $request->file('berkas_pendukung')->storeAs('public/Pembayaran/bukti', $file_name1);
        } else {
            $file_name1 = null;
        }
        Keuangan::create([
            'nama_keuangan' => $request->nama_keuangan,
            'jumlah' => $this->convertRP($request->jumlah),
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'sumber_dana_id' => $request->sumber_dana,
            'berkas_pendukung' => $file_name1,
            'status' => 'Proses',
            'kategori_keuangan_id' => '3'
        ]);
        return back()->with('success', 'Data Berhasil DiTambahkan');
    }

    public function lihatRkas()
    {
        $sumberdana = SumberDana::all();
        // return view('datakeuangan.edit', compact('sumberdana'));

        return view('datakeuangan.rkas', compact('sumberdana'));
    }
    public function review($id)
    {
        $keuangan = Keuangan::find($id);
        return view('datakeuangan.review', compact('keuangan'));
    }

    public function guru($id)
    {
       
        $keuangan = Keuangan::find($id);
        $sumberdana = SumberDana::get();
        return view('datakeuangan.guru', compact('keuangan', 'sumberdana'));
    }
}
