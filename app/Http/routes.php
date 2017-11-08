<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//LGOUT
Route::auth();

//LOGIN sudah fix
Route::post('/LoginGadai','LoginController@login');
Route::post('/register','LoginController@register');
// Route::get('/halamanlogin','LoginController@halamanlogin');

//ADMIN KETUA
Route::get('/home_ketua','KetuaController@home');

//USER
Route::get('/homes', 'DaftarController@home'); //untuk sesion nama per user
Route::get('/biodata','DaftarController@biodata'); //untuk menampilkan biodata
Route::post('/update_biodata', 'DaftarController@update_biodata'); //untuk mengupdate biodata
Route::get('/riwayat','DaftarController@riwayat'); //melihat berapa kali berhutang
Route::get('/detail_riwayat/{id}','DaftarController@detail_riwayat'); //melihatdetail pembayaran

//ADMIN TAFSIR
Route::get('/home_tafsir', 'TafsirController@home'); //grafik belum, masih polosan return view biasa
Route::get('/tafsir', 'TafsirController@tafsir'); //menampilkan form tafsir dan memasukan data tafsir
Route::post('/perhitungan', 'TafsirController@perhitungan'); //menghitung AHP
Route::get('/survey_pinjam','PinjamController@survey'); //menampilkan data yg selesai ditafsir dan akan disurvey(validasi)
Route::get('/validasi_pinjam/{id}', 'PinjamController@update'); //menampilkan form validasi dan di update nominal
Route::post('/validasi','PinjamController@validasi'); //proses memvalidasi atau mendecline
Route::get('/transaksi_pinjam','PinjamController@transaksi'); //menampilkan data pinjaman sebelum diproses
Route::get('/proses_pinjam/{id}','PinjamController@proses'); //klik tombol proses trus memasukan proses transaksi, ada kalkulator
Route::post('/hutang','PinjamController@hutang'); // masukan data dan perhitungan hutang ke database
Route::get('/utang_pinjam','PinjamController@utang_pinjam'); //menampilkan data siapa yang hutang
Route::get('/detail/{id}','PinjamController@detail'); //menampilkan detail rincian pembayaran
Route::get('/pdf/{id}','PinjamController@getPDF'); //mencetak pdf
Route::get('/vista','PinjamController@pdf');
// Route::get('/kriteria_tafsir', 'TafsirController@kriteria');
// Route::get('/subkriteria_tafsir', 'TafsirController@subkriteria');

//ADMIN BAYAR
Route::get('/home_bayar','BayarController@home'); //grafik belum
Route::get('/pembayaran','BayarController@pembayaran'); //menampilkan data customer yang belum lunas
Route::get('/transaksi/{id}', 'BayarController@transaksi'); //menampilkan form pembayaran cicilan
Route::post('/pembayaran_transaksi','BayarController@pembayarantransaksi'); //menyimpan cicilan ke database lalu di redirect ke data customer belum lunas
Route::get('/detail_pinjam','BayarController@detailpinjaman');//menampilkan data siapa yang hutang
Route::get('/detailnya/{id}','BayarController@detailnya'); //menampilkan detail rincian pembayaran
