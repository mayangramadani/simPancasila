<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::get();
        return view('sekolah', compact('sekolah'));
    }
    public function getIndex()
    {
        $data['page_title'] = 'Sekolah';
        $data['sekolah'] = Sekolah::all();

        foreach ($data['data'] as $key => $row) {
            $row->total = Sekolah::where('', $row->id)->count();
        }

        return view('', $data);
    }
    public function add(Request $request)
    {
        Sekolah::create($request->except(['_token', 'submit']));
        return redirect('/sekolah');
    }
    public function hapus($id)
    {
        $sekolah = Sekolah::find($id);
        $sekolah->delete();
        return redirect('/sekolah');
    }
    public function edit($id)
    {
        $sekolah = Sekolah::find($id);
        return view('sekolah.edit', compact('sekolah'));
    }
    public function update($id, Request $request)
    {
        $sekolah = Sekolah::find($id);
        $sekolah->update($request->except(['_token', 'submit']));
        return redirect('/sekolah');
    }
}
