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
		$data['user'] = Model_Hutang::detailPembayaran();
		return view ('admin_bayar.pembayaran',compact('data'));	
	}
	public function transaksi($id){
		$data['session'] = session('login');
		$data['transaksi'] = Model_Hutang::transaksi($id);
		$data['angsuran'] = Model_Transaksi::angsuran($id);
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

		$idpinjaman = $data['id_pinjaman'];
		$sisapinjaman = $data['sisa_pinjaman'];
		$sisacicilan = $data['sisa_cicilan'];
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
		Model_Hutang::pembayaran($idpinjaman,$sisapinjaman,$sisacicilan);
		
		$request->session()->flash('sukses','Pembayaran Berhasil');
		return redirect('/pembayaran');
	}

	public function detailpinjaman(){
		$data['session'] = session('login');
		$data['hutang'] = Model_Hutang::dataPeminjam();
		// dd($data);
		return view('admin_bayar.detailpinjam',compact('data'));
	}

	public function detailnya(Request $request, $id){
		$data['session'] = session('login');
		$data['count'] = Model_Transaksi::hitung($id);
		// dd($data);
		if ($data['count']==0) {
			$request->session()->flash('gagal','Transaksi Pembayaran Kosong');
			return redirect('/detail_pinjam');

		}else{
			$data['detail'] = Model_Transaksi::detail($id); 
			$data['total'] = Model_Transaksi::total($id); 
			$data['jumlah_pinjaman'] = $data['detail'][0]->jumlah_pinjaman;
			return view('admin_bayar.detailnya',compact('data'));
		}
	

	}

}