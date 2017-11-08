<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model_Customer;
use App\Model_KriteriaAHP;
use App\Model_Tafsir;
use App\Model_Hutang;
use PDF;


use Carbon\Carbon;
/**
* 
*/
class PinjamController extends Controller
{
	
	public function survey(){
		$data['tafsir'] = DB::select('select * from customer c join tafsir t on c.id_customer = t.id_customer where status = ?',[0]);
		return view('admin_pinjam.survey',compact('data'));
	}
	public function update($id){
		$data['tafsir'] = DB::select('select * from customer c join tafsir t on c.id_customer = t.id_customer where id_tafsir = ?',[$id]);

		return view('admin_pinjam.validasi',compact('data'));
	}
	public function validasi(Request $request){
		
		if ($request->terima) {
			$id_tafsir = $_POST['id_tafsir'];
			$maks_nilai = $_POST['maks_nilai'];
			$status = 1;

			DB::table('tafsir')
			->where('id_tafsir', $id_tafsir)
			->update(['maks_nilai' => $maks_nilai, 
				'status' => $status]);
			$request->session()->flash('terima','Survey Telah Disetujui');
			return redirect ('/transaksi_pinjam');

		}else{
			$id_tafsir = $_POST['id_tafsir'];
			DB::table('tafsir')
			->where('id_tafsir', $id_tafsir)
			->update(['status' => 9]);
			$request->session()->flash('tolak','Survey Ditolak');
			return redirect ('/survey_pinjam');
		}

	}

	public function transaksi(){
		$data['tafsir'] = DB::select('select * from customer c join tafsir t on c.id_customer = t.id_customer where status = ?',[1]);
		return view('admin_pinjam.pinjam',compact('data'));
	}

	public function proses($id){
		$data['user'] = DB::select('select * from customer c join tafsir t on c.id_customer = t.id_customer where id_tafsir = ?',[$id]);


		return view('admin_pinjam.formpinjam',compact('data'));
	}
	public function hutang(Request $request){
		$data['id_tafsir'] =$_POST['id_tafsir'];
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

		DB::table('tafsir')
		->where('id_tafsir', $data['id_tafsir'])
		->update(['status' => 2]);
		$request->session()->flash('sukses','Transaksi Berhasil');
		return redirect('/utang_pinjam');

	}
	public function utang_pinjam(){
		$data['hutang'] = DB::select('select * from hutang h join customer c on h.id_customer = c.id_customer');
		// dd($data);

		return view('admin_pinjam.utang_pinjam',compact('data'));
	}

	public function detail(Request $request, $id){
		$data['count'] = DB::select('select count(t.id_transaksi) as hitung from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman join customer c on c.id_customer = h.id_customer where t.id_pinjaman = ?',[$id])[0]->hitung;
		// dd($data);
		if ($data['count']==0) {
			$request->session()->flash('gagal','Transaksi Pembayaran Kosong');
			return redirect('/utang_pinjam');

		}else{
			$data['detail'] = DB::select('select t.angsuran_total, t.id_transaksi, t.id_pinjaman, t.angsuran_bunga, t.angsuran_pokok, t.sisa_pinjaman, t.angsuran_ke, c.nama, h.jumlah_pinjaman from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman join customer c on c.id_customer = h.id_customer where t.id_pinjaman = ?',[$id]);
			$data['total'] = DB::select('select SUM(t.angsuran_bunga) as total_bunga, SUM(t.angsuran_pokok) as total_pokok, SUM(t.angsuran_total) as total from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman where t.id_pinjaman = ?',[$id]);
			$data['jumlah_pinjaman'] = $data['detail'][0]->jumlah_pinjaman;
			return view('admin_pinjam.detail_pinjam',compact('data'));
		}
	

	}
	public function getPdf($id){
		
    $data['detail'] = DB::select('select t.angsuran_total, t.id_transaksi, t.id_pinjaman, t.angsuran_bunga, t.angsuran_pokok, t.sisa_pinjaman, t.angsuran_ke, c.nama, h.jumlah_pinjaman from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman join customer c on c.id_customer = h.id_customer where t.id_pinjaman = ?',[$id]);
			$data['total'] = DB::select('select SUM(t.angsuran_bunga) as total_bunga, SUM(t.angsuran_pokok) as total_pokok, SUM(t.angsuran_total) as total from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman where t.id_pinjaman = ?',[$id]);
			$data['jumlah_pinjaman'] = $data['detail'][0]->jumlah_pinjaman;
 	
    $pdf = PDF::loadView('vista',compact('data'));
 
    return $pdf->download('coba.pdf');
}

}