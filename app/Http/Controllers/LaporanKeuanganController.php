<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\LaporanKeuangan;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::all();
        return view('datalaporan.index', compact('sekolah'));
    }
    
}
