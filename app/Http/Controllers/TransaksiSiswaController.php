<?php

namespace App\Http\Controllers;

use App\Models\KategoriKeuangan;
use App\Models\KategoriPembayaran;
use App\Models\Keuangan;
use App\Models\Siswa;
use App\Models\TransaksiSiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiSiswaController extends Controller
{
    public function index()
    {
        $transaksisiswa = Keuangan::where('users_id', Auth::user()->id)
            ->where('status_pembayaran', 'Belum Lunas')->get();
        // dd($transaksisiswa);
        $siswa = Siswa::all();
        $kategoripembayaran = KategoriKeuangan::all();
        $user = User::where('role', 'siswa')->get();
        // dd($user);
        $dataSiswa = [];
        foreach ($user as $item) {
            $dataSiswa['nama_siswa'][$item->id] = $item->name;
        }
        // dd($dataSiswa);
        return view('transaksisiswa.index', compact('transaksisiswa', 'siswa', 'kategoripembayaran'));
    }

    public function getPembayaran(Request $request)
    {
        $pembayaran = Keuangan::find($request->id);
        // dd($pembayaran);
        return $pembayaran;
    }
    public function add(Request $request)
    {
        TransaksiSiswa::create($request->except(['_token', 'submit']));
        return redirect('/transaksisiswa');

        if ($request->bukti_transaksi != null) {
            $file = $request->bukti_transaksi;
            $extension = $file->extension();
            $date = date("his");
            $file_name1 = "Foto_$date.$extension";
            $path = $request->file('bukti_transaksi')->storeAs('public/Pembayaran/bukti', $file_name1);
        } else {
            $file_name2 = null;
        }

        TransaksiSiswa::create([
            'siswa_id' => $request->siswa_id,
            'kategori_pembayaran_id' => $request->kategori_pembayaran_id,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'users_id' => Auth::user()->id,
            'bukti' => $file_name1,
        ]);
        return redirect('transaksisiswa');
    }
    public function hapus($id)
    {
        $transaksisiswa = TransaksiSiswa::find($id);
        $transaksisiswa->delete();
        return redirect('/transaksisiswa');
    }
    public function edit($id)
    {
        $transaksisiswa = TransaksiSiswa::find($id);
        return view('transaksisiswa.edit', compact('transaksisiswa'));
    }
    public function update($id, Request $request)
    {
        $transaksisiswa = TransaksiSiswa::find($id);
        $transaksisiswa->update($request->except(['_token', 'submit']));
        return redirect('/transaksisiswa');
    }
    public function detail($id)
    {
        $transaksisiswa = TransaksiSiswa::find($id);
        return view('transaksisiswa.detail', compact('transaksisiswa'));
    }
}
