<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model_Customer;



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
		$data['biodata'] = DB::select('select * from customer where id_customer = ?',[$data['id_customer']]);
		// dd($data['biodata'][0]->nama);
		return view('admin_daftar.biodata',compact('data'));
	}

	public function update_biodata(Request $request){
		//mas liyatkan database nya mas
		if ($request->oke) {
			DB::table('customer')
			->where('id_customer', $request->id_customer)
			->update(['nama' => $request->nama, 
				'alamat' => $request->alamat,
				'kota_lahir' => $request->kota_lahir,
				'tanggal_lahir'=>$request->tanggal_lahir,
				'pekerjaan'=>$request->pekerjaan,
				'ktp'=>$request->ktp,
				'hp'=>$request->hp,
				'agama'=>$request->agama,
				'nama_ibu'=>$request->nama_ibu,
				'jenis_kelamin'=>$request->jenis_kelamin
			]);
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

		$data['hutang'] = DB::select('select * from hutang h join customer c on h.id_customer = c.id_customer where h.id_customer = ?',[$data['id_customer']]);
		
		
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
		$data['count'] = DB::select('select count(t.id_transaksi) as hitung from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman join customer c on c.id_customer = h.id_customer where t.id_pinjaman = ?',[$id])[0]->hitung;
		// dd($data);
		if ($data['count']==0) {
			$request->session()->flash('gagal','Transaksi Pembayaran Kosong');
			return redirect('/riwayat');

		}else{
			$data['detail'] = DB::select('select t.angsuran_total, t.id_transaksi, t.id_pinjaman, t.angsuran_bunga, t.angsuran_pokok, t.sisa_pinjaman, t.angsuran_ke, c.nama, h.jumlah_pinjaman from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman join customer c on c.id_customer = h.id_customer where t.id_pinjaman = ?',[$id]);
			$data['total'] = DB::select('select SUM(t.angsuran_bunga) as total_bunga, SUM(t.angsuran_pokok) as total_pokok, SUM(t.angsuran_total) as total from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman where t.id_pinjaman = ?',[$id]);
			$data['jumlah_pinjaman'] = $data['detail'][0]->jumlah_pinjaman;
			// dd($data);
			return view('admin_daftar.detail_hutang',compact('data'));
		}
	}



	
}