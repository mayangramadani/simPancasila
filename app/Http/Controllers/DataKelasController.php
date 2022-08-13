<?php

namespace App\Http\Controllers;

use App\Models\DataKelas;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\TingkatanKelas;
use Illuminate\Http\Request;

class DataKelasController extends Controller
{
    //
    public function index()
    {
        $datakelas = DataKelas::latest()->get();
        $tingkatankelas = TingkatanKelas::all();
        $sekolah = Sekolah::all();
        return view('datakelas.index', compact('datakelas', 'tingkatankelas', 'sekolah'));
    }

    public function getIndex()
    {
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

        DataKelas::create([
            'tingkatan_kelas_id' => $request->tingkatan_kelas_id,
            'nama_kelas' => $request->nama_kelas,
            'kuota' => $request->kuota,

        ]);
        return redirect('datakelas');
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
        $sekolah = Sekolah::all();
        $tingkatankelas = TingkatanKelas::all();
        return view('datakelas.edit', compact('datakelas', 'sekolah', 'tingkatankelas'));
    }
    public function update($id, Request $request)
    {
        $datakelas = DataKelas::find($id);
        $datakelas->update($request->except(['_token', 'submit']));
        return redirect('/datakelas');
    }
    public function detail($id)
    {
        $datakelas = DataKelas::find($id);
        $siswa = Siswa::where('sekolah_id', $datakelas->sekolah_id)->get();
        return view('datakelas.detail', compact('datakelas', 'siswa'));
    }
}
