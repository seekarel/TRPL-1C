<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
* 
*/
class Model_Customer extends Model
{
	protected $table = 'customer';
	protected $primaryKey = 'id_customer';
	protected $fillable = ['id_customer','nama','alamat','kota_lahir','tanggal_lahir','pekerjaan','ktp','hp','agama','nama_ibu','jenis_kelamin','id'];

	public static function updateBiodata($id_customer,$nama,$alamat,$kota_lahir,$tanggal_lahir,$pekerjaan,$ktp,$hp,$agama,$nama_ibu,$jenis_kelamin){
		DB::table('customer')
			->where('id_customer', $id_customer)
			->update(['nama' => $nama, 
				'alamat' => $alamat,
				'kota_lahir' => $kota_lahir,
				'tanggal_lahir'=>$tanggal_lahir,
				'pekerjaan'=>$pekerjaan,
				'ktp'=>$ktp,
				'hp'=>$hp,
				'agama'=>$agama,
				'nama_ibu'=>$nama_ibu,
				'jenis_kelamin'=>$jenis_kelamin
			]);
	}

	public static function customerHutang($idcustomer){
		return DB::table('customer')->join('hutang','hutang.id_customer','=','customer.id_customer')->where('hutang.id_customer',$idcustomer)->get(); 
	}

	public static function countData($id){
		return DB::select('select count(t.id_transaksi) as hitung from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman join customer c on c.id_customer = h.id_customer where t.id_pinjaman = ?',[$id])[0]->hitung;
	}

	public static function detailTransaksi($id){
		return DB::select('select t.angsuran_total, t.id_transaksi, t.id_pinjaman, t.angsuran_bunga, t.angsuran_pokok, t.sisa_pinjaman, t.angsuran_ke, c.nama, h.jumlah_pinjaman from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman join customer c on c.id_customer = h.id_customer where t.id_pinjaman = ?',[$id]);
	}

	public static function totalTransaksi($id){
		return DB::select('select SUM(t.angsuran_bunga) as total_bunga, SUM(t.angsuran_pokok) as total_pokok, SUM(t.angsuran_total) as total from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman where t.id_pinjaman = ?',[$id]);
	}

	public static function validasiTerima(){
		return DB::select('select * from customer c join tafsir t on c.id_customer = t.id_customer where status = ? or status = ?',[1,2]);
	}

	public static function validasiTolak(){
		return DB::select('select * from customer c join tafsir t on c.id_customer = t.id_customer where status = ?',[9]);
	}

	public static function lunas(){
		return DB::table('customer')->join('hutang','hutang.id_customer','=','customer.id_customer')->where('sisa_pinjaman',0)->get();
	}

	public static function belum(){
		return DB::table('customer')->join('hutang','hutang.id_customer','=','customer.id_customer')->where('sisa_pinjaman','>',0)->get();
	}

	public static function datacustomer(){
		return DB::select('select * from customer');
	}
	public $timestamps = false;
}