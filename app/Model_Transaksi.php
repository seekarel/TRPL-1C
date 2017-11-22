<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
* 
*/
class Model_Transaksi extends Model
{
	protected $table = 'transaksi';
	protected $primaryKey = 'id_transaksi';
	protected $fillable = ['id_transaksi','id_pinjaman','angsuran_bunga','angsuran_pokok','angsuran_total','sisa_pinjaman','angsuran_ke','pembayaran','administrasi','tanggal_transaksi'];

	public static function angsuran($id){
		return DB::select('select count(id_transaksi) as angsuran from transaksi where id_pinjaman = ?',[$id]);	
	}

	public static function hitung($id){
		return DB::select('select count(t.id_transaksi) as hitung from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman join customer c on c.id_customer = h.id_customer where t.id_pinjaman = ?',[$id])[0]->hitung;
	}

	public static function detail($id){
		return DB::select('select t.angsuran_total, t.id_transaksi, t.id_pinjaman, t.angsuran_bunga, t.angsuran_pokok, t.sisa_pinjaman, t.angsuran_ke, c.nama, h.jumlah_pinjaman from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman join customer c on c.id_customer = h.id_customer where t.id_pinjaman = ?',[$id]);
	}

	public static function total($id){
		return DB::select('select SUM(t.angsuran_bunga) as total_bunga, SUM(t.angsuran_pokok) as total_pokok, SUM(t.angsuran_total) as total from transaksi t join hutang h on t.id_pinjaman = h.id_pinjaman where t.id_pinjaman = ?',[$id]);
	}

	public $timestamps = false;
}