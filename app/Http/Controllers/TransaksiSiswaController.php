<?php

namespace App\Http\Controllers;

use App\Models\KategoriKeuangan;
use App\Models\KategoriPembayaran;
use App\Models\Keuangan;
use App\Models\Siswa;
use App\Models\TransaksiSiswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiSiswaController extends Controller
{
    public function index()
    {
        $transaksisiswa = Keuangan::where('users_id', Auth::user()->id)->get();
        $siswa = Siswa::where('users_id', Auth::user()->id)->first();
        $kategorikeuangan = KategoriKeuangan::all();

        return view('transaksisiswa.index', compact('transaksisiswa', 'siswa', 'kategorikeuangan'));
    }

    public function getPembayaran(Request $request)
    {
        $pembayaran = Keuangan::where('id', $request->id)->with(['KategoriKeuangan' => function ($query) {
            $query->select('nama_keuangan');
        }])->first();
        // dd($pembayaran);
        return $pembayaran;
    }
    public function add(Request $request)
    {
        // dd($request->all());

        if ($request->bukti_pembayaran != null) {
            $file = $request->bukti_pembayaran;
            $extension = $file->extension();
            $date = date("his");
            $file_name1 = "Foto_$date.$extension";
            $path = $request->file('bukti_pembayaran')->storeAs('public/Pembayaran/bukti', $file_name1);
        } else {
            $file_name1 = null;
        }

        $keuangan = Keuangan::find($request->bulan_pembayaran);
        $keuangan->tanggal = Carbon::now();
        $keuangan->bukti = $file_name1;
        $keuangan->status_pembayaran = 'Proses';
        $keuangan->save();

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
