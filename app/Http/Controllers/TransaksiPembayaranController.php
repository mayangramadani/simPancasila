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
        $transaksipembayaran = Keuangan::all();

        $siswa = Siswa::get();
        $kategorikeuangan = KategoriKeuangan::all();
        return view('transaksipembayaran.index', compact('transaksipembayaran', 'siswa', 'kategorikeuangan'));
    }


    public function bayar()
    {
        $siswa = Siswa::where('isActive', True)->get();
        // dd($siswa);
        // dd($request->sekolah);
        foreach ($siswa as $item) {

            Keuangan::create([
                'no_transaksi' => Str::random(9),
                'kategori_keuangan_id' => 1,
                'users_id' => $item->users_id,
                'nama_keuangan' => "Bayar SPP Siswa - " . date("M Y"),
                'sekolah_id' => $item->sekolah_id,
                'jumlah' => $this->convertRP($item->Sekolah->spp)              
                // 'jumlah' => $item->Sekolah->spp

            ]);
        }
        return back();
    }

    public function getDataSiswa($id)
    {

        $transaksipembayaran = Keuangan::join('siswa', 'keuangan.users_id', 'siswa.users_id')->where('siswa.id', $id)
            ->get();
        return $transaksipembayaran;
    }

    public function getPembayaranBySiswa($id)
    {

        $transaksipembayaran = Keuangan::join('siswa', 'keuangan.users_id', 'siswa.users_id')->where('siswa.id', $id)
            ->get();
        return $transaksipembayaran;
    }
}
