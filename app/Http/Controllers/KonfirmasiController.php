<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class KonfirmasiController extends Controller
{
    public function index()
    {
        $konfirmasi = Keuangan::where('status_pembayaran', 'Proses')->get();

        return view('konfirmasi.index', compact('konfirmasi'));
    }
}
