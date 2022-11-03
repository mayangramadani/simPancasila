<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Saldo;
use Illuminate\Http\Request;

class   KonfirmasiController extends Controller
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
        // dd($request->all());
        $konfirmasi = Keuangan::find($id);
        $konfirmasi->status_pembayaran = $request->status_pembayaran;
        if ($konfirmasi->status_pembayaran == 'Diterima') {
            $cariSekolah = Saldo::where('sekolah_id', $konfirmasi->sekolah_id)->latest()->first();
            dd($konfirmasi->KategoriKeuangan->kategori_keuangan);
            if ($konfirmasi->KategoriKeuangan->kategori_keuangan == "pemasukan") {
                if ($cariSekolah) {
                    Saldo::Create([
                        'sekolah_id' => $konfirmasi->sekolah_id,
                        'debit' => $konfirmasi->jumlah,
                        'kredit' => 0,
                        'saldo' => $cariSekolah->saldo + $konfirmasi->jumlah
                    ]);
                } else {
                    Saldo::Create([
                        'sekolah_id' => $konfirmasi->sekolah_id,
                        'debit' => $konfirmasi->jumlah,
                        'kredit' => 0,
                        'saldo' => -$konfirmasi->jumlah
                    ]);
                }
            }
            if ($konfirmasi->KategoriKeuangan->kategori_keuangan == "pengeluaran") {
                if ($cariSekolah) {
                    Saldo::Create([
                        'sekolah_id' => $konfirmasi->sekolah_id,
                        'debit' => 0,
                        'kredit' => $konfirmasi->jumlah,
                        'saldo' => $cariSekolah->saldo - $konfirmasi->jumlah
                    ]);
                } else {
                    Saldo::Create([
                        'sekolah_id' => $konfirmasi->sekolah_id,
                        'debit' => 0,
                        'kredit' => $konfirmasi->jumlah,
                        'saldo' => -$konfirmasi->jumlah
                    ]);
                }
            }
        }

        $konfirmasi->save();
        return redirect('/konfirmasi');
    }
}
