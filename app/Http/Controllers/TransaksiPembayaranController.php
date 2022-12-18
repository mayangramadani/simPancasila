<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\KategoriKeuangan;
use App\Models\KategoriPembayaran;
use App\Models\Keuangan;
use App\Models\Siswa;
use App\Models\TransaksiPembayaran;
use Carbon\Carbon;
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
    public function add(Request $request)
    {
        if ($request->bukti != null) {
            $file = $request->bukti;
            $extension = $file->extension();
            $date = date("his");
            $file_name1 = "Foto_$date.$extension";
            $path = $request->file('bukti')->storeAs('public/Pembayaran/bukti', $file_name1);
        } else {
            $file_name1 = null;
        }
        $keuangan = Keuangan::find($request->bulan_pembayaran);
        $keuangan->tanggal = Carbon::now();
        $keuangan->bukti = $file_name1;
        $keuangan->status_pembayaran = 'Proses';
        $keuangan->save();

        $transaksi_data = [
            'transaksi_id' => $keuangan->id,
            'message' => 'Transaksi Tertambah',
        ];
        // $user = User::find($keuangan->users_id);
        // Notification::send($user, new InvoiceTransaksi($transaksi_data));
        return redirect('transaksipembayaran')->with('success', 'Data Berhasil Terkirim');
    }
    public function update($id, Request $request)
    {
        // dd($request->all());
        $transaksipembayaran = TransaksiPembayaran::find($id);
        $transaksipembayaran->update($request->except(['_token', 'submit']));
        return redirect('/transaksipembayaran');
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
                'jumlah' => ($item->Sekolah->spp)              
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
