<?php

namespace App\Http\Controllers;

use App\Models\AksesKelas;
use App\Models\DataKelas;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\TingkatanKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // dd($request->all());
        DataKelas::create([
            'tingkatan_kelas_id' => $request->tingkatan_kelas,
            'nama_kelas' => $request->nama_kelas,
            'kuota' => $request->kuota,

        ]);
        return redirect('datakelas');
    }
    public function hapus($id)
    {
        $datakelas = DataKelas::find($id);
        $datakelas->delete();
        return redirect('/datakelas')->with('success', 'Data Berhasil Dihapus');;
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
        // $siswa = Siswa::find(Auth::user()->id);
        $datakelas = DataKelas::select('data_kelas.*','tingkatan_kelas.sekolah_id')->join('tingkatan_kelas', 'tingkatan_kelas.id', 'data_kelas.tingkatan_kelas_id')
            ->where('data_kelas.id', $id)->first();
        // dd($datakelas);
        // $akseskelas = AksesKelas::where('kelas_id', '!=', $id)->where('siswa_id', '!=', $siswa->id)->get();
        $siswa = Siswa::where('sekolah_id',$datakelas->sekolah_id)->get();
        // dd($siswa);
        $dataku = null;
        foreach ($siswa as $item) {
            // dd($item->id);
            // $akseskelas = AksesKelas::where([
            //     'siswa_id' => $item->id,
            //     'kelas_id' => $id,
            // ])->exists();
            $akseskelas = AksesKelas::where('siswa_id', $item->id)->where('tahun', date("Y"))->exists();
            if ($akseskelas == False) {
                $dataku[] = [
                    'id' => $item->id,
                    'nis' => $item->nis,
                    'nama_siswa' => $item->nama_siswa,
                ];
            }
        }
        // dd($akseskelas);
        return view('datakelas.detail', compact('datakelas', 'siswa', 'akseskelas', 'dataku'));
    }
    public function show($id)
    {
        $AksesKelas = AksesKelas::where('kelas_id', $id)->where('tahun', Date("Y"))->get();
        $datakelas = DataKelas::find($id);
        // $siswa = Siswa::where('datakelas_id', $datakelas->id)->get();
        // dd($siswa);
        return view('datakelas.show', compact('AksesKelas', 'datakelas'));
    }
    public function download($id)
    {
        $kelas = DataKelas::find($id);
        $datakelas = AksesKelas::where('kelas_id', $id)->where('tahun', Date("Y"))->get();
        return view('datakelas.download', compact('datakelas', 'kelas'));
    }
}
