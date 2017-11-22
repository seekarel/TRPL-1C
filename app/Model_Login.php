<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Model_Login extends Model
{
	protected $table = 'login';
	protected $primaryKey = 'id';
	protected $fillable = ['id','username','password','level'];

	public static function cek($username,$password){
		return DB::select('select count(id) as total from login where username = ? and password = ? ',[$username,$password])[0]->total;
	}

	public static function result($username,$password){
		 return DB::select('select level, username, id from login where username = ? and password = ?',[$username,$password]);
	}

	public static function  cekUsername($username){
		return DB::select('select count(id) as row from login where username=?',[$username])[0]->row;
	}

	public static function ambilid($username,$password){
		return DB::select('select id from login where username=? and password=?',[$username,$password])[0]->id;
	}
	public $timestamps = false;
}