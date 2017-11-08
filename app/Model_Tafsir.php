<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class Model_Tafsir extends Model
{
	protected $table = 'tafsir';
	protected $primaryKey = 'id_tafsir';
	protected $fillable = ['id_tafsir','id_customer','id_penghasilan','id_kondisiusaha','id_melunasi','id_aset','id_tanggungan','id_kepemilikan','nama_barang','nilai_barang','maks_pinjaman','maks_nilai','nilai_ahp','status','tanggal_tafsir'];

	public $timestamps = false;
}