<?php

namespace App\Http\Controllers;
use App\Models\Konfirmasi;
use Illuminate\Http\Request;

class KonfirmasiController extends Controller
{
    //
    public function index(){
        $konfirmasi=Konfirmasi::get();
        return view('transaksi.konfirmasi',compact('konfirmasi'));
    }
}
