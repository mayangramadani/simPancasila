<?php

namespace App\Http\Controllers;

use App\Models\PembayaranSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PembayaranSiswaController extends Controller
{
    //
    public function index()
    {
        $siswa = Siswa::get();
        return view('pembayaransiswa', compact('siswa'));
    }

    public function pembayaran()
    {
        $siswa = Siswa::get();
        return view('pembayaransiswa', compact('siswa'));
    }
    public function tampilkan($id)
    {
        $siswa = Siswa::find($id);
        return view('tampilkan', compact('siswa'));
    }
    // public function gettampilkan($id)
    // {
    //     $siswa = Siswa::find($id);
    //     return $siswa;
    // }
}
