<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class Model_Transaksi extends Model
{
	protected $table = 'transaksi';
	protected $primaryKey = 'id_transaksi';
	protected $fillable = ['id_transaksi','id_pinjaman','angsuran_bunga','angsuran_pokok','angsuran_total','sisa_pinjaman','angsuran_ke','pembayaran','administrasi','tanggal_transaksi'];

	public $timestamps = false;
}