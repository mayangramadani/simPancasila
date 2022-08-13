<?php

namespace App\Http\Controllers;

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
        $kategoripembayaran = KategoriKeuangan::all();
        return view('transaksipembayaran.index', compact('transaksipembayaran', 'siswa', 'kategoripembayaran'));
    }
    public function bayar()
    {
        // dd("woi");
        $siswa = Siswa::where('isActive', True)->get();
        // dd($siswa);
        foreach ($siswa as $item) {
            Keuangan::create([
                'kategori_keuangan_id' => 1,
                'users_id' => $item->users_id,
                'nama_keuangan' => "Bayar SPP Siswa",
            ]);
        }
        return back();
    }
}
