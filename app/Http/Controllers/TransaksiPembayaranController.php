<?php

namespace App\Http\Controllers;

use App\Models\KategoriPembayaran;
use App\Models\Siswa;
use App\Models\TransaksiPembayaran;
use Illuminate\Http\Request;

class TransaksiPembayaranController extends Controller
{
    public function index()
    {
        $transaksipembayaran = TransaksiPembayaran::all();
        $siswa = Siswa::get();
        $kategoripembayaran = KategoriPembayaran::all();
        return view('transaksipembayaran.index', compact('transaksipembayaran', 'siswa', 'kategoripembayaran'));

    }
}
