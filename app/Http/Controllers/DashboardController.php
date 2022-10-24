<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Saldo;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // dd('asd');
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
            if(Auth::user()->role == 'admin'){
                $debit = Saldo::all();
                $kredit = Saldo::all();
                $dashboard = Keuangan::all();

            } else{
                $debit = Saldo::all();
                $kredit = Saldo::all();
                $dashboard = Keuangan::where('users_id',Auth::id())->get();
            }

        return view('dashboard', compact('jumlahSaldo', 'debit', 'kredit', 'dashboard'));
    }
}
