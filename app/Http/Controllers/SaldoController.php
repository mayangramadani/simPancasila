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
        $data['page_title'] = 'Saldo';
        $data['data'] = saldo::all();
    }
    public function add(Request $request)
    {
        saldo::create($request->except(['_token', 'submit']));
        return redirect('/saldo');
    }
    public function hapus($id)
    {
        $saldo = saldo::find($id);
        $saldo->delete();
        return redirect('/saldo');
    }
    public function edit($id)
    {
        $saldo = Saldo::find($id);
        $datasekolah = Sekolah::all();
        return view('saldo.edit', compact('saldo', 'datasekolah'));
    }
    public function update($id, Request $request)
    {
        $saldo = Saldo::find($id);
        $saldo->update($request->except(['_token', 'submit']));
        return redirect('/saldo');
    }
}
