<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\KategoriKeuangan;
use App\Models\KategoriPembayaran;
use App\Models\Keuangan;
use App\Models\Siswa;
use App\Models\TransaksiPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiPembayaranController extends Controller
{
    public function index()
    {
        $transaksipembayaran = Keuangan::where('users_id', Auth::user()->id)->get();

        $siswa = Siswa::get();
        $kategorikeuangan = KategoriKeuangan::all();
        return view('transaksipembayaran.index', compact('transaksipembayaran', 'siswa', 'kategorikeuangan'));
    }


    public function bayar()
    {
        // dd("woi");
        $siswa = Siswa::where('isActive', True)->get();
        // dd($siswa);
        foreach ($siswa as $item) {
            Keuangan::create([
                'no_transaksi' => Str::random(9),
                'kategori_keuangan_id' => 1,
                'users_id' => $item->users_id,
                'nama_keuangan' => "Bayar SPP Siswa - ".date("M Y"),
                'sekolah_id' => $item->sekolah_id
            ]);
        }
        return back();
    }
}
