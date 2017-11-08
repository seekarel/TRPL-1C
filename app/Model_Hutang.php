<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class Model_Hutang extends Model
{
	protected $table = 'hutang';
	protected $primaryKey = 'id_pinjaman';
	protected $fillable = ['id_pinjaman','id_customer','tanggal_pinjaman','jumlah_pinjaman','lama_pinjaman','bunga_pinjaman','angsuran_pokok','angsuran_bunga','total_angsuran','sisa_pinjaman','sisa_cicilan'];

	public $timestamps = false;
}