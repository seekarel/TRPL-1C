<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model_Customer;
use App\Model_Hutang;



use Carbon\Carbon;
/**
* 
*/
class DaftarController extends Controller
{
	
	public function home()
	{
		$data['id'] = session('login')['id'];
		$data['nama_user'] = DB::select('select nama from customer where id = ?',[$data['id']])[0]->nama;
		// dd($data['id']);
		return view('admin_daftar.home',compact('data'));
	}

	public function biodata(){

		$data['id'] = session('login')['id'];
		$data['nama_user'] = DB::select('select nama from customer where id = ?',[$data['id']])[0]->nama;
		$data['id_customer'] = DB::select('select id_customer from customer where id = ?',[$data['id']])[0]->id_customer;
		$data['biodata'] = Model_Customer::all()->where('id_customer',$data['id_customer']);
		// $data['biodata'] = DB::select('select * from customer where id_customer = ?',[$data['id_customer']]);
		// dd($data['biodata'][0]->nama);
		return view('admin_daftar.biodata',compact('data'));
	}

	public function update_biodata(Request $request){
		//mas liyatkan database nya mas
		$id_customer = $_POST['id_customer'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$kota_lahir = $_POST['kota_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$pekerjaan = $_POST['pekerjaan'];
		$ktp = $_POST['ktp'];
		$hp = $_POST['hp'];
		$agama = $_POST['agama'];
		$nama_ibu = $_POST['nama_ibu'];
		$jenis_kelamin = $_POST['jenis_kelamin'];

		if ($request->oke) {
			Model_Customer::updateBiodata($id_customer,$nama,$alamat,$kota_lahir,$tanggal_lahir,$pekerjaan,$ktp,$hp,$agama,$nama_ibu,$jenis_kelamin);
			$request->session()->flash('sukses','Berhasil Merubah Data');
			return redirect('/biodata');

		}else{
			return redirect('/biodata');
		}

	}

	public function riwayat(){
		$data['id'] = session('login')['id'];
		$data['nama_user'] = DB::select('select nama from customer where id = ?',[$data['id']])[0]->nama;
		
		$data['id_customer'] = DB::select('select id_customer, id from customer where id = ?',[$data['id']])[0]->id_customer;
		$idcustomer = $data['id_customer'];
		$data['hutang'] = Model_Customer::customerHutang($idcustomer);
		
		if (empty($data['hutang'])) {
			$data['hutang'] = 0;
			return view('admin_daftar.riwayat',compact('data'));
		}else{
			return view('admin_daftar.riwayat',compact('data'));
		}

		// dd($data);
		// dd($data['hutang'][0]->nama);
		
	}

	public function detail_riwayat(Request $request, $id){
		$data['id'] = session('login')['id'];
		$data['nama_user'] = DB::select('select nama from customer where id = ?',[$data['id']])[0]->nama;
		$data['count'] = Model_Customer::countData($id);
		// dd($data);
		if ($data['count']==0) {
			$request->session()->flash('gagal','Transaksi Pembayaran Kosong');
			return redirect('/riwayat');

		}else{
			$data['detail'] = Model_Customer::detailTransaksi($id);			
			$data['total'] = Model_Customer::totalTransaksi($id);
			$data['jumlah_pinjaman'] = $data['detail'][0]->jumlah_pinjaman;
			// dd($data);
			return view('admin_daftar.detail_hutang',compact('data'));
		}
	}



	
}