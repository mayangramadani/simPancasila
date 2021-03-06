<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\DataKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataSiswaController extends Controller
{
    //
    public function index()
    {
        $siswa = Siswa::get();
        $datakelas = DataKelas::get();
        return view('datasiswa.index', compact('siswa', 'datakelas'));
    }
    public function store(Request $request)
    {

        $file = $request->foto;
        // dd($file);
        $extension = $file->extension();
        $date = date("his");
        // dd($extension);
        $file_name1 = "Foto_$date.$extension";
        $path = $request->file('foto')->storeAs('public/DataSiswa/Foto', $file_name1);

        Siswa::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'kelas_id' => $request->kelas_id,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'ayah' => $request->ayah,
            'ibu' => $request->ibu,
            'foto' => $file_name1,
            'users_id' => Auth::user()->id,
        ]);
        return redirect('datasiswa');
    }
    public function create()
    {
        $siswa = Siswa::get();
        $datakelas = DataKelas::get();
        return view('datasiswa.create', compact('siswa', 'datakelas'));
    }

    public function getsiswa($id)
    {
        $siswa = Siswa::find($id);
        return $siswa;
    }

    public function hapus($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('/datasiswa');
    }
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('datasiswa.edit', compact('siswa'));
    }
    public function update($id, Request $request)

    {
        // dd($request->foto);
        $siswa = Siswa::find($id);
        $siswa->nis = $request->nis;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->alamat = $request->alamat;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->no_hp = $request->no_hp;
        $siswa->ayah = $request->ayah;
        $siswa->ibu = $request->ibu;
        $siswa->agama = $request->agama;

        if ($request->foto != null) {

            Storage::delete("public/DataSiswa/Foto/$siswa->foto");

            $date = date("his");
            $file = $request->foto;
            $extension = $file->extension();
            // dd($extension);
            $file_name1 = "Foto$date.$extension";
            $path = $request->file('foto')->storeAs('public/DataSiswa/Foto', $file_name1);

            $siswa->foto = $file_name1;
        }
        $siswa->save();
        return redirect('/datasiswa');
    }
    public function detail($id)
    {
        $siswa = Siswa::find($id);
        return view('datasiswa.detail', compact('siswa'));
    }
}
