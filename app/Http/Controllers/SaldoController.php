<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    //
    public function index()
    {
        $saldo = Saldo::get();
        $sekolah = Sekolah::all();
        return view('saldo.index', compact('saldo', 'sekolah'));
    }
    public function getIndex()
    {
        $saldo['saldo'] = saldo::all();

        foreach ($saldo['saldo'] as $key => $row) {
            $row->saldo = 'Rp' . number_format($row->saldo, 2);
        }

        return view('saldo.index', $saldo);
    }
    public function add(Request $request)
    {
       
        saldo::create($request->except(['_token', 'submit']));
        return redirect('/saldo');

        Saldo::create([
            'sekolah_id' => $request->sekolah_id,
            'debit' => $this->convertRP($request->debit),
            'kredit' => $this->convertRP($request->kredit),
            'saldo' => $this->convertRP($request->saldo),
        ]);
        return redirect('/saldo');
    }
    public function hapus($id)
    {
        $saldo = saldo::find($id);
        $saldo->delete();
        return redirect('/saldo')->with('success', 'Data Berhasil Dihapus');;
    }
    public function edit($id)
    {
        $saldo = Saldo::find($id);
        $datasekolah = Sekolah::all();
        return view('saldo.edit', compact('saldo', 'datasekolah'));
    }
    public function update($id, Request $request)
    {
        dd($request->all());
        $saldo = Saldo::find($id);
        $saldo->update($request->except(['_token', 'submit']));
        if ($saldo) {
            Saldo::Create([
                'sekolah_id' => $keuangan->sekolah_id,
                'debit' => 0,
                'kredit' => $keuangan->jumlah,
                'saldo'=> $saldo->saldo - $keuangan->jumlah
            ]);
        }
        Saldo::Create([
            'sekolah_id' => $keuangan->sekolah_id,
            'debit' => 0,
            'kredit' => $keuangan->jumlah,
            'saldo'=> -$keuangan->jumlah
        ]);
        return redirect('/saldo');
    }
    public function show()
    {
        $saldo = Saldo::all();
        // dd($saldo);
        return view('saldo.show', compact('saldo'));
    }
}

