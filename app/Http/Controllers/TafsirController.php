<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model_Customer;
use App\Model_KriteriaAHP;
use App\Model_Tafsir;


use Carbon\Carbon;
/**
* 
*/
class TafsirController extends Controller
{
	public function home(){
		return view('admin_tafsir.home');
	}

	public function kriteria(){
		$data['kriteria']=DB::select('select * from kriteria');
		$data['hitungkriteria'] = DB::select('select nilai_kriteria from kriteria');
		$kriteria 	= array('penghasilan', 'kondisi_usaha', 'melunasi_hutang', 'aset', 'tanggungan_hidup', 'kepemilikan_rumah');
		$data['nama_kriteria'] 	= array('penghasilan', 'kondisi_usaha', 'melunasi_hutang', 'aset', 'tanggungan_hidup', 'kepemilikan_rumah');
		$data['jumlah_kriteria'] 	= array(0,0,0,0,0,0);
		$data['pv_kriteria'] 		= array(0,0,0,0,0,0);
		for($i = 0; $i < count($kriteria); $i++){
			for($j = 0; $j < count($kriteria); $j++){
				$data['jumlah_kriteria'][$j] += $data['hitungkriteria'][$j+($i*count($kriteria))]->nilai_kriteria;
			}
		}

		$indeks_pv = 0;
		for($i = 0; $i < count($kriteria); $i++){
			for ($j = 0; $j < count($kriteria); $j ++) { 
				$data['pv_kriteria'][$i] += round($data['hitungkriteria'][$indeks_pv]->nilai_kriteria / $data['jumlah_kriteria'][$j] / 6, 2);
				$indeks_pv++;
			}
		}
		$data['pev'] = (($data['pv_kriteria'][0]*$data['jumlah_kriteria'][0])+($data['pv_kriteria'][1]*$data['jumlah_kriteria'][1])+($data['pv_kriteria'][2]*$data['jumlah_kriteria'][2])+($data['pv_kriteria'][3]*$data['jumlah_kriteria'][3])+($data['pv_kriteria'][4]*$data['jumlah_kriteria'][4])+($data['pv_kriteria'][5]*$data['jumlah_kriteria'][5]));
		$data['ci'] = ($data['pev']-6)/(6-1);
		$data['cr'] = $data['ci']/1.24;
		return view ('admin_tafsir.kriteria',compact('data'));
	}

	public function subkriteria(){
		$data['subkriteria'] = DB::select('select * from subkriteria');
		$data['subkriteria'] = $data['subkriteria'] = DB::select('select nilai_sub from subkriteria');
		$data['nama_subkriteria'] 	= array('sangat kurang', 'kurang', 'cukup', 'baik', 'sangat baik');
		$subkriteria 	= array('sangat kurang', 'kurang', 'cukup', 'baik', 'sangat baik');
		$data['jumlah_subkriteria'] 	= array(0,0,0,0,0);
		$data['pv_subkriteria'] 		= array(0,0,0,0,0);

		for($i = 0; $i < count($subkriteria); $i++){
			for($j = 0; $j < count($subkriteria); $j++){
				$data['jumlah_subkriteria'][$j] += $data['subkriteria'][$j+($i*count($subkriteria))]->nilai_sub;
			}
		}

		$indeks_pvsub = 0;
		for($i = 0; $i < count($subkriteria); $i++){
			for ($j = 0; $j < count($subkriteria); $j ++) { 
				$data['pv_subkriteria'][$i] += round($data['subkriteria'][$indeks_pvsub]->nilai_sub / $data['jumlah_subkriteria'][$j] / 5, 3);
				$indeks_pvsub++;
			}
		}
		// dd($data);
		return view ('admin_tafsir.subkriteria',compact('data'));
	}

	public function tafsir(){
		$data['customer'] = Model_Customer::datacustomer();
		$data['penghasilan'] = Model_Tafsir::datapenghasilan();
		$data['kondisiusaha'] = Model_Tafsir::datakondisiusaha();
		$data['kemampuanmelunasihutang'] =Model_Tafsir::kemampuanhutang();
		$data['aset'] = Model_Tafsir::dataaset();
		$data['tanggunganhidup'] = Model_Tafsir::datahidup();
		$data['kepemilikanrumah'] = Model_Tafsir::datakepemilikan();

		return view('admin_tafsir.tafsir',compact('data'));

	}

	public function perhitungan(){
		$data['id_customer'] = $_POST['id_customer'];
		$data['id_penghasilan'] = $_POST['id_penghasilan'];
		$data['id_kondisiusaha'] = $_POST['id_kondisiusaha'];
		$data['id_melunasi'] = $_POST['id_melunasi'];
		$data['id_aset'] = $_POST['id_aset'];
		$data['id_tanggungan'] = $_POST['id_tanggungan'];
		$data['id_kepemilikan'] = $_POST['id_kepemilikan'];
		$data['tanggal_tafsir'] = $_POST['tanggal_tafsir'];
		$data['nama_barang'] = $_POST['nama_barang'];
		$data['nilai_barang'] = $_POST['nilai_barang'];
		$data['maks_pinjaman'] = 0;
		$data['maks_nilai'] = 0;
		$data['nilai_ahp'] = 0;
		$data['status'] = 0;
		
		//hitunganKRITERIA
		$data['hitungkriteria'] = DB::select('select nilai_kriteria from kriteria');
		$kriteria 	= array('penghasilan', 'kondisi_usaha', 'melunasi_hutang', 'aset', 'tanggungan_hidup', 'kepemilikan_rumah');
		$data['jumlah_kriteria'] 	= array(0,0,0,0,0,0);
		$data['pv_kriteria'] 		= array(0,0,0,0,0,0);
		for($i = 0; $i < count($kriteria); $i++){
			for($j = 0; $j < count($kriteria); $j++){
				$data['jumlah_kriteria'][$j] += $data['hitungkriteria'][$j+($i*count($kriteria))]->nilai_kriteria;
			}
		}

		$indeks_pv = 0;
		for($i = 0; $i < count($kriteria); $i++){
			for ($j = 0; $j < count($kriteria); $j ++) { 
				$data['pv_kriteria'][$i] += round($data['hitungkriteria'][$indeks_pv]->nilai_kriteria / $data['jumlah_kriteria'][$j] / 6, 2);
				$indeks_pv++;
			}
		}

		//hitunganSUBKRITERIA
		$data['subkriteria'] = $data['subkriteria'] = DB::select('select nilai_sub from subkriteria');
		$subkriteria 	= array('sangat kurang', 'kurang', 'cukup', 'baik', 'sangat baik');
		$data['jumlah_subkriteria'] 	= array(0,0,0,0,0);
		$data['pv_subkriteria'] 		= array(0,0,0,0,0);

		for($i = 0; $i < count($subkriteria); $i++){
			for($j = 0; $j < count($subkriteria); $j++){
				$data['jumlah_subkriteria'][$j] += $data['subkriteria'][$j+($i*count($subkriteria))]->nilai_sub;
			}
		}

		$indeks_pvsub = 0;
		for($i = 0; $i < count($subkriteria); $i++){
			for ($j = 0; $j < count($subkriteria); $j ++) { 
				$data['pv_subkriteria'][$i] += round($data['subkriteria'][$indeks_pvsub]->nilai_sub / $data['jumlah_subkriteria'][$j] / 5, 3);
				$indeks_pvsub++;
			}
		}
		
		$data['cekpenghasilan'] = $data['pv_subkriteria'][4 - ($data['id_penghasilan'] - 1)];
		$data['cekkondisiusaha'] = $data['pv_subkriteria'][4 - ($data['id_kondisiusaha'] - 1)];
		$data['cekmelunasi'] = $data['pv_subkriteria'][4 - ($data['id_melunasi'] - 1)];
		$data['cekaset'] = $data['pv_subkriteria'][4 - ($data['id_aset'] - 1)];
		$data['cektanggungan'] = $data['pv_subkriteria'][4 - ($data['id_tanggungan'] - 1)];
		$data['cekkepemilikan'] = $data['pv_subkriteria'][4 - ($data['id_kepemilikan'] - 1)];

		$data['nilai_ahp'] = round(($data['pv_kriteria'][0] * $data['cekpenghasilan']) + ($data['pv_kriteria'][1] * $data['cekkondisiusaha']) + ($data['pv_kriteria'][2] * $data['cekmelunasi']) + ($data['pv_kriteria'][3] * $data['cekaset']) + ($data['pv_kriteria'][4] * $data['cektanggungan']) + ($data['pv_kriteria'][5] * $data['cekkepemilikan']), 2);

		if ($data['nilai_ahp'] >= $data['pv_subkriteria'][0]){
			$data['maks_pinjaman'] = 0.9;
		}else if ($data['nilai_ahp'] >= $data['pv_subkriteria'][1] && $data['nilai_ahp'] < $data['pv_subkriteria'][0]) {
			$data['maks_pinjaman'] = 0.85;
		}else if ($data['nilai_ahp'] >= $data['pv_subkriteria'][2] && $data['nilai_ahp'] < $data['pv_subkriteria'][1]) {
			$data['maks_pinjaman'] = 0.8;
		}else if ($data['nilai_ahp'] >= $data['pv_subkriteria'][3] && $data['nilai_ahp'] < $data['pv_subkriteria'][2]) {
			$data['maks_pinjaman'] = 0.75;
		}else{
			$data['maks_pinjaman'] = 0.7;
		}

		$data['maks_nilai'] = $data['maks_pinjaman'] * $data['nilai_barang'];

		$insert = ([
			'id_customer' => $data['id_customer'],
			'id_penghasilan' => $data['id_penghasilan'] ,
			'id_kondisiusaha' => $data['id_kondisiusaha'],
			'id_melunasi' => $data['id_melunasi'],
			'id_aset' => $data['id_aset'],
			'id_tanggungan' => $data['id_tanggungan'],
			'id_kepemilikan' => $data['id_kepemilikan'],
			'nama_barang' => $data['nama_barang'],
			'nilai_barang' => $data['nilai_barang'],
			'maks_pinjaman' => $data['maks_pinjaman'],
			'maks_nilai' => $data['maks_nilai'],
			'nilai_ahp' => $data['nilai_ahp'],
			'status' => $data['status'],
			'tanggal_tafsir' => $data['tanggal_tafsir']]);
		Model_Tafsir::create($insert);
		return redirect('/survey_pinjam');
	}

}