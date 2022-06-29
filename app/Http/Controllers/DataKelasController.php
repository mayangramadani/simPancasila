<?php

namespace App\Http\Controllers;

use App\Models\DataKelas;
use Illuminate\Http\Request;

class DataKelasController extends Controller
{
    //
    public function index()
    {
        $datakelas = DataKelas::get();
        return view('datakelas.index', compact('datakelas'));
    }
    public function getIndex(){
        $data['page_title'] = 'Data Kelas';
        $data['data'] = DataKelas::all();

        foreach ($data['data'] as $key => $row) {
        	$row->total = Datakelas::where('rombels_id', $row->id)->count();
        }

        return view('rombels.index', $data);
    }
    public function add(Request $request)
    {
        DataKelas::create($request->except(['_token', 'submit']));
        return redirect('/datakelas');
    }
    public function hapus($id)
    {
        $datakelas = DataKelas::find($id);
        $datakelas->delete();
        return redirect('/datakelas');
    }
    public function edit($id)
    {
        $datakelas = DataKelas::find($id);
        return view('datakelas.edit', compact('datakelas'));
    }
    public function update($id, Request $request)
    {
        $datakelas = DataKelas::find($id);
        $datakelas->update($request->except(['_token', 'submit']));
        return redirect('/datakelas');
    }
}
