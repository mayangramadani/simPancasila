<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\Siswa;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class DataSiswaController extends Controller
{
    //
    public function index()
    {
        $siswa = Siswa::latest()->get();
        $sekolah = Sekolah::get();
        return view('datasiswa.index', compact('siswa', 'sekolah'));
    }
    public function importSiswa(Request $request)
    {
        Excel::import(new SiswaImport, $request->file('file'));
        return back();
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
        $sekolah = Sekolah::get();
        return view('datasiswa.create', compact('siswa', 'sekolah'));
    }

    public function getsiswa($id)
    {
        $siswa = Siswa::leftjoin('data_kelas', 'data_kelas.id', 'siswa.kelas_id')
            ->where('siswa.id', $id)->select('siswa.*', 'data_kelas.nama_kelas')->first();
        return $siswa;
    }

    public function hapus($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('/datasiswa')->with('success', 'Data Berhasil Dihapus');;
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
        return redirect('/datasiswa')->with('success', 'Data Berhasil Terkirim');
    }
    public function detail($id)
    {
        $siswa = Siswa::find($id);
        return view('datasiswa.detail', compact('siswa'));
    }
    public function cariSiswa(Request $request)
    {
        // $siswa = Siswa::where('sekolah_id', $request->sekolah)->where('isActive', True)->get();
        // return $siswa;

        if (!$request->sekolah) {
            $html = null;
        } else {
            $html = '';
            $siswa = Siswa::where('sekolah_id', $request->sekolah)->where('isActive', True)->get();
            foreach ($siswa as $item) {
                $html .= '<tr role="row" class="odd">
                <td class="text-center">' . $item->id . '</td>
                <td class="text-center">' . $item->nis . '</td>
                <td class="text-center">' . $item->nama_siswa . '</td>
                <td class="d-flex justify-content-center">
                    <a href="/datasiswa/' . $item->id . '/detail" id="2"
                        class="detail me-2">
                        <button class="btn btn-outline-info btn-sm" type="button"><i
                                class="fa fa-pencil-square"></i>
                            Detail
                        </button>
                    </a>
                </td>
            </tr>';
            }
        }

        return response()->json(['html' => $html]);
    }
}
