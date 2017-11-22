<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
DB::select('select * from hutang h join customer c on h.id_customer = c.id_customer');/**
* 
*/
class Model_Tafsir extends Model
{
	protected $table = 'tafsir';
	protected $primaryKey = 'id_tafsir';
	protected $fillable = ['id_tafsir','id_customer','id_penghasilan','id_kondisiusaha','id_melunasi','id_aset','id_tanggungan','id_kepemilikan','nama_barang','nilai_barang','maks_pinjaman','maks_nilai','nilai_ahp','status','tanggal_tafsir'];


	public static function tafsir(){
		return DB::table('tafsir')->join('customer','customer.id_customer','=','tafsir.id_customer')->where('status',0)->get();

	}

	public static function validasitafsir($id){
		return DB::table('tafsir')->join('customer','customer.id_customer','=','tafsir.id_customer')->where('id_tafsir',$id)->get();

	}
	
	public static function transaksi(){
		return DB::table('tafsir')->join('customer','customer.id_customer','=','tafsir.id_customer')->where('status',1)->get();
	}

	public static function terima($id_tafsir,$maks_nilai,$status){
		DB::table('tafsir')->where('id_tafsir', $id_tafsir)->update(['maks_nilai' => $maks_nilai,'status' => $status]);
	}

	public static function tolak($id_tafsir){
		DB::table('tafsir')
			->where('id_tafsir', $id_tafsir)
			->update(['status' => 9]);
	}

	public static function proses($id){
		return DB::table('tafsir')->join('customer','customer.id_customer','=','tafsir.id_customer')->where('id_tafsir',$id)->get();
	}

	public static function datapenghasilan(){
		return DB::select('select * from k_penghasilan');
	}

	public static function datakondisiusaha(){
		return DB::select('select * from k_kondisiusaha');
	}

	public static function kemampuanhutang(){
		return DB::select('select * from k_melunasihutang');
	}

	public static function dataaset(){
		return DB::select('select * from k_aset');
	}

	public static function datahidup(){
		return DB::select('select * from k_tanggunganhidup');
	}

	public static function datakepemilikan(){
		return DB::select('select * from k_kepemilikanrumah');
	}

	public $timestamps = false;
}