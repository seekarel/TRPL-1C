<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Login extends Model
{
	protected $table = 'login';
	protected $primaryKey = 'id';
	protected $fillable = ['id','username','password','level'];

	public $timestamps = false;
}