<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
* 
*/
class Model_Hutang extends Model
{
	protected $table = 'hutang';
	protected $primaryKey = 'id_pinjaman';
	protected $fillable = ['id_pinjaman','id_customer','tanggal_pinjaman','jumlah_pinjaman','lama_pinjaman','bunga_pinjaman','angsuran_pokok','angsuran_bunga','total_angsuran','sisa_pinjaman','sisa_cicilan'];

	public static function hutang(){
		return DB::table('hutang')->join('customer','customer.id_customer','=','hutang.id_customer')->get();
	}

	public static function cekTransaksi($id){
		return DB::select('select count(t.id_transaksi) as hitung from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman join customer c on c.id_customer = h.id_customer where t.id_pinjaman = ?',[$id])[0]->hitung;
	}

	public static function detail($id){
		return DB::select('select t.angsuran_total, t.id_transaksi, t.id_pinjaman, t.angsuran_bunga, t.angsuran_pokok, t.sisa_pinjaman, t.angsuran_ke, c.nama, h.jumlah_pinjaman from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman join customer c on c.id_customer = h.id_customer where t.id_pinjaman = ?',[$id]);
	}

	public static function total($id){
		return DB::select('select SUM(t.angsuran_bunga) as total_bunga, SUM(t.angsuran_pokok) as total_pokok, SUM(t.angsuran_total) as total from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman where t.id_pinjaman = ?',[$id]);
	}

	public static function ubah($idtafsir){
		DB::table('tafsir')
		->where('id_tafsir', $idtafsir)
		->update(['status' => 2]);
	}

	public static function detailPembayaran(){
		return DB::table('hutang')->join('customer','customer.id_customer','=','hutang.id_customer')->where('sisa_pinjaman','>',0)->get(); 
	}

	public static function pembayaran($idpinjaman,$sisapinjaman,$sisacicilan){
		DB::table('hutang')
			->where('id_pinjaman', $idpinjaman)
			->update(['sisa_pinjaman' => $sisapinjaman,
					  'sisa_cicilan' => $sisacicilan]);
	}

	public static function transaksi($id){
		return DB::table('hutang')->join('customer','customer.id_customer','=','hutang.id_customer')->where('id_pinjaman',$id)->get(); 
	}

	public static function dataPeminjam(){
		return DB::table('hutang')->join('customer','customer.id_customer','=','hutang.id_customer')->get(); 
	}

	
	public $timestamps = false;
}