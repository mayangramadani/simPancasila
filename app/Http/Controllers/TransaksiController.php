<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    public function index()
    {
        $siswa = Siswa::get();
        return view('transaksi.index', compact('siswa'));
    }

    // ini coba
    public function postAdd(Request $request)
    {
        $Siswa = Siswa::findOrFail($request->users_id);
        $tdetail = Transaksi::where('siswa_id', $Siswa->id)->count();

        $data = new Transaksi;
        $data->users_id = $Siswa->id;
        $data->transaksi_id = $Siswa->transaksi_id;
        $data->payment_method = "Cash";
        $data->amount = $request->total_transaksi;

        $for_month = [];
        for ($i = $tdetail + 1; $i <= $request->for_month; $i++) {
            $for_month[] = $i;
        }

        $data->for_month = implode(',', $for_month);
        $data->description = "-";
        $data->status = "Success Payment";
        $data->approved_at = now();
        $data->admins_id = auth('admin')->user()->id;
        $data->save();

        foreach ($for_month as $row) {
            $detail = new Transaksi;
            $detail->users_id = $Siswa->id;
            $detail->month = $row;
            $detail->transaksi_id = $data->id;
            $detail->save();
        }

        Transaksi::add([
            'page' => 'Transaksi',
            'description' => 'Menambahkan Transaksi Baru: ' . $Siswa->name
        ]);

        return redirect()->back()->with([
            'message_type' => 'success',
            'message'   => 'Transaksi Berhasil!'
        ]);
    }
}
