<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SppController extends Controller
{
    //
    public function index()
    {
        $siswa = Siswa::get();
        return view('spp.index', compact('siswa'));
    }

    // ini coba
    public function postAdd(Request $request)
    {
        $Siswa = Siswa::findOrFail($request->users_id);
        $tdetail = Spp::where('siswa_id', $Siswa->id)->count();

        $data = new Spp;
        $data->users_id = $Siswa->id;
        $data->spp_id = $Siswa->spp_id;
        $data->payment_method = "Cash";
        $data->amount = $request->total_spp;

        $for_month = [];
        for ($i = $tdetail + 1; $i <= $request->for_month; $i++) {
            $for_month[] = $i;
        }

        $data->for_month = implode(',', $for_month);
        $data->description = "-";
        $data->status = "Success Payment";
        $data->approved_at = now();
        $data->admins_id = auth('admin')->user()->id;
        $data->save();

        foreach ($for_month as $row) {
            $detail = new Spp;
            $detail->users_id = $Siswa->id;
            $detail->month = $row;
            $detail->spp_id = $data->id;
            $detail->save();
        }

        Spp::add([
            'page' => 'spp',
            'description' => 'Menambahkan spp Baru: ' . $Siswa->name
        ]);

        return redirect()->back()->with([
            'message_type' => 'success',
            'message'   => 'spp Berhasil!'
        ]);
    }
}
