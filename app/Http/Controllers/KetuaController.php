<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model_Customer;



use Carbon\Carbon;
/**
* 
*/
class KetuaController extends Controller
{
	
	public function home()
	{
		$data['id'] = session('login')['id'];
		$data['nama_user'] = DB::select('select username from login where id = ?',[$data['id']])[0]->username;
		return view('admin_ketua.home',compact('data'));
	}

	public function customer(){
		$data['id'] = session('login')['id'];
		$data['nama_user'] = DB::select('select username from login where id = ?',[$data['id']])[0]->username;
		$data['customer'] = Model_Customer::all();
		
		return view ('admin_ketua.customer',compact('data'));
	}

	public function validasi(){

		$data['id'] = session('login')['id'];
		$data['nama_user'] = DB::select('select username from login where id = ?',[$data['id']])[0]->username;

		$data['terima'] = Model_Customer::validasiTerima();
		$data['tolak'] = Model_Customer::validasiTolak();
		// dd($data);
		return view('admin_ketua.validasi',compact('data'));
	}

	public function hutang(){
		$data['id'] = session('login')['id'];
		$data['nama_user'] = DB::select('select username from login where id = ?',[$data['id']])[0]->username;
		$data['lunas'] = Model_Customer::lunas();
		$data['belum'] = Model_Customer::belum();

		return view('admin_ketua.hutang',compact('data'));
	}

	

	
}