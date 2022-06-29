<?php

namespace App\Http\Controllers;

use DB;
use DataTable;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;

class Data extends Controller
{
    public function getStudents(){
		$data = DB::table('siswa')
		->join('kelas','siswa.kelas_id','=','kelas.id')
		->join('spp','siswa.spp_id','=','spp.id')
		->select('siswa.id','siswa.nama_siswa','kelas.nama_kelas as kelas','siswa.jenis_kelamin','spp.amount','spp.info')
		->get();

		return datatables()->of($data)->make(true);
	}

	public function getInfoStudent($nama_siswa){
		$siswa = Siswa::where('nama_siswa', $nama_siswa)->first();
		$detail = DetailTransaksi::where('siswa_id', $siswa->id)
		->count();

		$list_month = [];
		$i = $detail+1;
		for ($i > $detail; $i <= 12; $i++) { 
			$arr['value'] = $i;
			$arr['text'] = spp_month($i);
			$list_month[] = $arr;
		}

		$data['siswa_id'] = $siswa->id;
		$data['amount_spp'] = $siswa->spp->amount;
		if ($detail) {
			$data['last_month'] = spp_month($detail);
			$data['last_month_int'] = $detail;
		}else{
			$data['last_month'] = "Belum Ada";
			$data['last_month_int'] = 0;
		}

		$data['list_month'] = $list_month;

		return response()->json($data);

	}
}
