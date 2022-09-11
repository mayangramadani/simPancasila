<?php

namespace App\Http\Controllers;

use App\Models\SumberDana;
use Illuminate\Http\Request;

class SumberDanaController extends Controller
{
    public function index()
    {
        $sumberdana = SumberDana::get();
        return view('datakeuangan.index', compact('datakeuangan'));
    }
    public function add(Request $request)
    {

        $sumberdana = SumberDana::create([
            'sumber_dana' => $request->sumber_dana,
            'deskripsi' => $request->deskripsi
        ]);
        return back();
    }
}
