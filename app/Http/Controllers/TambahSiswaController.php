<?php

namespace App\Http\Controllers;
use App\Models\TambahSiswa;
use Illuminate\Http\Request;

class TambahSiswaController extends Controller
{
    //
    public function index(){
        $tambahsiswa=TambahSiswa::get();
        return view('tambahsiswa',compact('tambahsiswa'));
    }
}

