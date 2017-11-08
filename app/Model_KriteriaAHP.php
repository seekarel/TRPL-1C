<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class Model_Customer extends Model
{
	protected $table = 'customer';
	protected $primaryKey = 'id_customer';
	protected $fillable = ['id_customer','nama','alamat','kota_lahir','tanggal_lahir','pekerjaan','ktp','agama','nama_ibu','jenis_kelamin'];

	public $timestamps = false;
}