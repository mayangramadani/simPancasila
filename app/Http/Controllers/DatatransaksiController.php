<?php

namespace App\Http\Controllers;

use Activity;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Datatransaksi;
use App\Http\Controllers\Controller;

class DatatransaksiController extends Controller
{
    public function getIndex()
    {
        $page_title = 'Data Transaksi';
        $datatransaksi = Datatransaksi::all();

        foreach ($datatransaksi as $key => $row) {
            $row->amount = 'Rp' . number_format($row->amount, 2);
            $row->total = Siswa::where('transaksi_id', $row->id)->count();
        }

        return view('transaksi.datatransaksi', compact('datatransaksi'));
    }

    public function getAdd()
    {
        $transaksi['page_title'] = 'Tambah Data Transaksi';

        return view('transaksi.form', $transaksi);
    }

    public function postAdd(Request $request)
    {
        $request->validate([
            'period' => 'required',
            'amount' => 'required',
        ]);

        Datatransaksi::create($request->all());

        Activity::add([
            'page' => 'Tambah Data Transaksi',
            'description' => 'Menambahkan Spp Baru: ' . $request->name
        ]);

        return redirect('transaksi/datatransaksi')->with([
            'message_type' => 'success',
            'message' => 'Data Berhasil Disimpan'
        ]);
    }

    public function getEdit($id)
    {
        $transaksi['page_title'] = 'Edit Data Transaksi';
        $transaksi['datatransaksis'] = Datatransaksi::find($id);

        return view('spp.form', $transaksi);
    }

    public function postEdit($id, Request $request)
    {
        $request->validate([
            'period' => 'required',
            'amount' => 'required',
        ]);

        Datatransaksi::findOrFail($id)->update($request->all());

        Activity::add([
            'page' => 'Edit Data Spp',
            'description' => 'Mengedit Data Spp: ' . number_format($request->amount) . ' ~ ' . $request->period
        ]);

        return redirect('transaksi/datatransaksi')->with([
            'message_type' => 'success',
            'message' => 'Data Berhasil Diedit'
        ]);
    }

    public function getDelete($id)
    {
        $data = Datatransaksi::findOrFail($id);
        $name = number_format($data->amount) . ' ~ ' . $data->period;

        $data->delete();

        Activity::add([
            'page' => 'Data Spp',
            'description' => 'Menghapus Data Spp: ' . $name
        ]);

        return redirect()->back()->with([
            'message_type' => 'success',
            'message'   => 'Data Berhasil Dihapus!'
        ]);
    }
}
