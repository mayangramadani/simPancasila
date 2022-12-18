<?php

namespace App\Http\Controllers;

use App\Models\AksesKelas;
use App\Models\KategoriKeuangan;
use App\Models\KategoriPembayaran;
use App\Models\Keuangan;
use App\Models\Siswa;
use App\Models\TransaksiSiswa;
use App\Models\User;
use App\Notifications\InvoiceTransaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class TransaksiSiswaController extends Controller
{
    public function index()
    {
        $transaksisiswa = Keuangan::where('users_id', Auth::user()->id)->get();
        // dd($transaksisiswa);
        $siswa = Siswa::where('users_id', Auth::user()->id)->first();
        $kelasSiswa = AksesKelas::where('siswa_id', $siswa->id)->latest()->first();
        // dd(Auth::user());
        // dd($kelasSiswa, $siswa->id);
        $kategorikeuangan = KategoriKeuangan::all();

        return view('transaksisiswa.index', compact('transaksisiswa', 'siswa', 'kategorikeuangan', 'kelasSiswa'));
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

        if ($request->bukti != null) {
            $file = $request->bukti;
            $extension = $file->extension();
            $date = date("his");
            $file_name1 = "Foto_$date.$extension";
            $path = $request->file('bukti')->storeAs('public/Pembayaran/bukti', $file_name1);
        } else {
            $file_name1 = null;
        }
        // dd(Carbon::now());
        $keuangan = Keuangan::find($request->bulan_pembayaran);
        // dd($keuangan);
        $keuangan->tanggal = Carbon::now();
        $keuangan->bukti = $file_name1;
        $keuangan->status_pembayaran = 'Proses';
        $keuangan->save();

        $transaksi_data = [
            'transaksi_id' => $keuangan->id,
            'message' => 'Transaksi Tertambah',
        ];
        $user = User::find($keuangan->users_id);
        Notification::send($user, new InvoiceTransaksi($transaksi_data));


        return redirect('transaksisiswa')->with('success', 'Data Berhasil Terkirim');
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
        // dd($request->all());
        $transaksisiswa = TransaksiSiswa::find($id);
        $transaksisiswa->update($request->except(['_token', 'submit']));
        return redirect('/transaksisiswa');
    }
    public function detail($id)
    {
        $transaksisiswa = TransaksiSiswa::find($id);
        return view('transaksisiswa.detail', compact('transaksisiswa'));
    }
    public function historisiswa()
    {
        $transaksisiswa = TransaksiSiswa::where('users_id', Auth::user()->id)->get();
        // $transaksisiswa = Keuangan::where('users_id', Auth::user()->id)->get();
        $siswa = Siswa::where('users_id', Auth::user()->id)->first();
        $kategorikeuangan = KategoriKeuangan::all();

        return view('transaksisiswa.historisiswa', compact('transaksisiswa', 'siswa', 'kategorikeuangan'));
    }

    public function show($id)
    {
        $transaksisiswa = TransaksiSiswa::find($id);
        return view('transaksisiswa.show', compact('transaksisiswa'));
    }
}
