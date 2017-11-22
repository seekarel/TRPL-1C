<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model_Customer;
use App\Model_KriteriaAHP;
use App\Model_Tafsir;
use App\Model_Hutang;
use App\Model_Login;
use PDF;


use Carbon\Carbon;
/**
* 
*/
class PinjamController extends Controller
{
	
	public function survey(){
		$data['tafsir'] = Model_Tafsir::tafsir();
		return view('admin_pinjam.survey',compact('data'));
	}
	public function update($id){
		$data['tafsir'] = Model_Tafsir::validasitafsir($id);
		return view('admin_pinjam.validasi',compact('data'));
	}
	public function validasi(Request $request){
		
		if ($request->terima) {
			$id_tafsir = $_POST['id_tafsir'];
			$maks_nilai = $_POST['maks_nilai'];
			$status = 1;
			Model_Tafsir::terima($id_tafsir,$maks_nilai,$status);
			$request->session()->flash('terima','Survey Telah Disetujui');
			return redirect ('/transaksi_pinjam');

		}else{
			$id_tafsir = $_POST['id_tafsir'];
			Model_Tafsir::tolak($id_tafsir);
			$request->session()->flash('tolak','Survey Ditolak');
			return redirect ('/survey_pinjam');
		}

	}

	public function transaksi(){
		$data['tafsir'] = Model_Tafsir::transaksi();
		return view('admin_pinjam.pinjam',compact('data'));
	}

	public function proses($id){
		$data['user'] = Model_Tafsir::proses($id);
		return view('admin_pinjam.formpinjam',compact('data'));
	}
	public function hutang(Request $request){
		$data['id_tafsir'] =$_POST['id_tafsir'];
		$idtafsir = $data['id_tafsir'];
		$data['id_customer'] = $_POST['id_customer'];
		$data['nama'] = $_POST['nama'];
		$data['jumlah_pinjaman'] = $_POST['jumlah_pinjaman'];
		$data['lama_pinjaman'] = $_POST['lama_pinjaman'];
		$data['bunga_pinjaman'] = $_POST['bunga_pinjaman'];
		$data['angsuran_pokok'] = $_POST['angsuran_pinjaman'];
		$data['angsuran_bunga'] = $_POST['angsuran_bunga'];
		$data['total_angsuran'] = $_POST['total_angsuran'];
		$data['sisa_pinjaman'] = $data['jumlah_pinjaman'];
		$data['sisa_cicilan'] = $data['lama_pinjaman'];
		// dd($data);
		$insert = ([
			'id_customer' => $data['id_customer'],
			'jumlah_pinjaman' => $data['jumlah_pinjaman'],
			'lama_pinjaman' => $data['lama_pinjaman'],
			'bunga_pinjaman' => $data['bunga_pinjaman'],
			'angsuran_pokok' => $data['angsuran_pokok'],
			'angsuran_bunga' => $data['angsuran_bunga'],
			'total_angsuran' => $data['total_angsuran'],
			'sisa_pinjaman' => $data['sisa_pinjaman'],
			'sisa_cicilan' => $data['lama_pinjaman']
		]);
		Model_Hutang::create($insert);
		Model_Hutang::ubah($idtafsir);
		
		$request->session()->flash('sukses','Transaksi Berhasil');
		return redirect('/utang_pinjam');

	}
	public function utang_pinjam(){

		$data['hutang'] = Model_Hutang::hutang();
		return view('admin_pinjam.utang_pinjam',compact('data'));
	}

	public function detail(Request $request, $id){
		$data['count'] = Model_Hutang::cekTransaksi($id);
		if ($data['count']==0) {
			$request->session()->flash('gagal','Transaksi Pembayaran Kosong');
			return redirect('/utang_pinjam');

		}else{
			$data['detail'] = Model_Hutang::detail($id);
			$data['total'] = Model_Hutang::total($id);
			$data['jumlah_pinjaman'] = $data['detail'][0]->jumlah_pinjaman;
			return view('admin_pinjam.detail_pinjam',compact('data'));
		}


	}
	public function getPdf($id){
		
		$data['detail'] = Model_Hutang::detail($id);
		$data['total'] = Model_Hutang::total($id);
		$data['jumlah_pinjaman'] = $data['detail'][0]->jumlah_pinjaman;
		$pdf = PDF::loadView('vista',compact('data'));

		return $pdf->download('coba.pdf');
	}

}