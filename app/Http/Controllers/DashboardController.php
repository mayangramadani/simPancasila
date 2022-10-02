<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::all();
        foreach ($sekolah as $item) {
            $saldo[$item->id] = Saldo::latest()->where('sekolah_id', $item->id)->pluck('saldo')
                ->first();
        }
        $jumlahSaldo = 0;
        foreach ($saldo as $item) {
            $jumlahSaldo = $jumlahSaldo + (int)$item;
        }
        // dd($jumlahSaldo);
        //Debit
        // foreach ($sekolah as $item) {
        $debit = Saldo::all();
        $kredit = Saldo::all();

        return view('dashboard', compact('jumlahSaldo', 'debit', 'kredit'));
    }
}
