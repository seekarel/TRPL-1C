<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model_Customer;
use App\Model_KriteriaAHP;
use App\Model_Tafsir;
use App\Model_Hutang;
use App\Model_Transaksi;


use Carbon\Carbon;
/**
* 
*/
class BayarController extends Controller
{
	public function home(){
		$data['session'] = session('login');
		return view('admin_bayar.home',compact('data'));
	}
	public function pembayaran(){
		$data['session'] = session('login');
		$data['user'] = DB::select('select * from hutang h join customer c on h.id_customer = c.id_customer where h.sisa_pinjaman > ?',[0]);
		// dd($data);
		return view ('admin_bayar.pembayaran',compact('data'));	
	}
	public function transaksi($id){
		$data['session'] = session('login');
		$data['transaksi'] = DB::select('select * from hutang h join customer c on h.id_customer = c.id_customer where id_pinjaman = ?',[$id]);
		$data['angsuran'] = DB::select('select count(id_transaksi) as angsuran from transaksi where id_pinjaman = ?',[$id]);
		return view('admin_bayar.transaksi',compact('data'));
	}
	public function pembayarantransaksi(Request $request){
		$data['hutang'] = DB::select('select * from hutang h join customer c on h.id_customer = c.id_customer where id_pinjaman = ?',[$_POST['id_pinjaman']]);
		$data['id_pinjaman'] = $_POST['id_pinjaman'];
		$data['id_customer'] = $_POST['id_customer'];
		$data['nama'] = $_POST['nama'];
		$data['angsuranke'] = $_POST['angsuranke'];
		$data['angsuran_total'] = $_POST['angsuran_total'];
		$data['administrasi'] = $_POST['administrasi'];
		$data['total'] = $_POST['total'];
		$data['pembayaran'] = $_POST['pembayaran'];
		$data['kembalian'] = $_POST['kembalian'];
		$data['angsuran_pokok'] = $_POST['angsuran_pokok'];
		$data['angsuran_bunga'] = $_POST['angsuran_bunga'];
		$data['sisa_hutang'] = $_POST['sisa_hutang'];
		$data['sisa_pinjaman'] = $data['hutang'][0]->sisa_pinjaman - $data['angsuran_pokok'];
		$data['sisa_cicilan'] = $data['hutang'][0]->sisa_cicilan - 1;
		if ($data['sisa_pinjaman'] <= 10 ) {
			$data['sisa_pinjaman'] = 0;
		}else{
			$data['sisa_pinjaman'] = $data['sisa_pinjaman'];
		}
		// dd($data);
		$insert = ([
			'id_pinjaman' => $data['id_pinjaman'],
			'angsuran_bunga' =>$data['angsuran_bunga'],
			'angsuran_pokok' => $data['angsuran_pokok'],
			'angsuran_total' => $data['angsuran_total'] ,
			'sisa_pinjaman' => $data['sisa_pinjaman'],
			'angsuran_ke' => $data['angsuranke'],
			'pembayaran' => $data['total'],
			'administrasi' => $data['administrasi']]);
		Model_Transaksi::create($insert);

		DB::table('hutang')
			->where('id_pinjaman', $data['id_pinjaman'])
			->update(['sisa_pinjaman' => $data['sisa_pinjaman'],
					  'sisa_cicilan' => $data['sisa_cicilan']]);
		$request->session()->flash('sukses','Pembayaran Berhasil');
		return redirect('/pembayaran');
	}

	public function detailpinjaman(){
		$data['session'] = session('login');
		$data['hutang'] = DB::select('select * from hutang h join customer c on h.id_customer = c.id_customer');
		// dd($data)
		return view('admin_bayar.detailpinjam',compact('data'));
	}

	public function detailnya(Request $request, $id){
		$data['session'] = session('login');
		$data['count'] = DB::select('select count(t.id_transaksi) as hitung from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman join customer c on c.id_customer = h.id_customer where t.id_pinjaman = ?',[$id])[0]->hitung;
		// dd($data);
		if ($data['count']==0) {
			$request->session()->flash('gagal','Transaksi Pembayaran Kosong');
			return redirect('/detail_pinjam');

		}else{
			$data['detail'] = DB::select('select t.angsuran_total, t.id_transaksi, t.id_pinjaman, t.angsuran_bunga, t.angsuran_pokok, t.sisa_pinjaman, t.angsuran_ke, c.nama, h.jumlah_pinjaman from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman join customer c on c.id_customer = h.id_customer where t.id_pinjaman = ?',[$id]);
			$data['total'] = DB::select('select SUM(t.angsuran_bunga) as total_bunga, SUM(t.angsuran_pokok) as total_pokok, SUM(t.angsuran_total) as total from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman where t.id_pinjaman = ?',[$id]);
			$data['jumlah_pinjaman'] = $data['detail'][0]->jumlah_pinjaman;
			return view('admin_bayar.detailnya',compact('data'));
		}
	

	}

}