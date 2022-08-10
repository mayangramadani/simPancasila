<?php

namespace App\Http\Controllers;

use App\Models\TingkatanKelas;
use Illuminate\Http\Request;

class TingkatanKelasController extends Controller
{
    public function index()
    {
        $tingkatankelas = TingkatanKelas::get();  
        return view('tingkatankelas.index', compact('tingkatankelas'));
    }
    public function getIndex(){
        $data['page_title'] = 'Tingkatan Kelas';
        $data['data'] = TingkatanKelas::all();

        foreach ($data['data'] as $key => $row) {
        	$row->total = TingkatanKelas::where('rombels_id', $row->id)->count();
        }

        return view('rombels.index', $data);
    }
    public function add(Request $request)
    {
        TingkatanKelas::create($request->except(['_token', 'submit']));
        return redirect('/tingkatankelas');

        TingkatanKelas::create([
            'nama_tingkatan' => $request->tingkatan_kelas,
            'deskripsi' => $request->deskripsi, 
          
        ]);
        return redirect('tingkatankelas');
        
    }
    public function hapus($id)
    {
        $tingkatankelas = TingkatanKelas::find($id);
        $tingkatankelas->delete();
        return redirect('/tingkatankelas');
    }
    public function edit($id)
    {
        $tingkatankelas = TingkatanKelas::find($id);
        return view('tingkatankelas.edit', compact('tingkatankelas'));
    }
    public function update($id, Request $request)
    {
        $tingkatankelas = tingkatankelas::find($id);
        $tingkatankelas->update($request->except(['_token', 'submit']));
        return redirect('/tingkatankelas');
    }
}
