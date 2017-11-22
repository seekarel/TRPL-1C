<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model_Customer;
use App\Model_KriteriaAHP;
use App\Model_Login;


use Carbon\Carbon;
/**
* 
*/
class LoginController extends Controller
{

	public function login(Request $request){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$cek = Model_Login::cek($username,$password);
		$result = Model_Login::result($username,$password);

		if($cek == 1){
			$level = $result[0]->level;
			$session = array(
				'username' => $result[0]->username,
				'level' => $result[0]->level,
				'id' => $result[0]->id
				);
			
			$request->session()->put('login', $session); //simpan session
			$request->session()->flash('sukses','Selamat datang '.$result[0]->username);
			if ($level == 0) {
				return redirect ('home_ketua');
			}elseif($level == 1) {
				return redirect ('homes');
			}elseif ($level == 2) {
				return redirect ('home_tafsir');
			}elseif ($level == 3) {
				return redirect ('home_bayar');
			}
		}else{
			$request->session()->flash('fail_login','Username atau Password Salah');
			return redirect ('/');
		}
	}

	public function register(Request $request){
		$level=1;
		$data['username']=$_POST['username'];
		$data['password']=$_POST['password'];
		$username = $data['username'];
		$password = $data['password'];
		$data['nama']=$_POST['nama'];
		$data['alamat']=$_POST['alamat'];
		$data['tempatlahir']=$_POST['lahir'];
		$data['tanggal']=$_POST['tanggal'];
		$data['pekerjaan']=$_POST['pekerjaan'];
		$data['ktp']=$_POST['ktp'];
		$data['hp']=$_POST['hp'];
		$data['agama']=$_POST['agama'];
		$data['namaibu']=$_POST['namaIbu'];
		$data['jk']=$_POST['kelamin'];

		$data['cekusername']= Model_Login::cekUsername($username);
		if ($data['cekusername']==0) {
			$insertlogin = ([
			'username' => $data['username'],
			'password' => $data['password'],
			'level' => $level]);
		Model_Login::create($insertlogin);
		}else{
			$request->session()->flash('gagal','Username telah digunakan');
			return redirect('/');
		}
		$data['ambilid'] = Model_Login::ambilid($username,$password);
		$insertbiodata = ([
			'nama' => $data['nama'],
			'alamat' => $data['alamat'],
			'kota_lahir' => $data['tempatlahir'],
			'tanggal_lahir' => $data['tanggal'],
			'pekerjaan' => $data['pekerjaan'],
			'ktp' => $data['ktp'],
			'hp' => $data['hp'],
			'agama' => $data['agama'],
			'nama_ibu' => $data['namaibu'],
			'jenis_kelamin' => $data['jk'],
			'id' => $data['ambilid']]);
		Model_Customer::create($insertbiodata);
		$request->session()->flash('sukses','Berhasil mendaftar');
		return redirect('/');
		
	}

	public function logout(){
		return redirect('/');
	}

}

