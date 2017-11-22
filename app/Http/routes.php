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
Route::get('/logout','LoginController@logout');

//LOGIN sudah fix
Route::post('/LoginGadai','LoginController@login');
Route::post('/register','LoginController@register');
// Route::get('/halamanlogin','LoginController@halamanlogin');

//ADMIN KETUA
Route::get('/home_ketua','KetuaController@home');
Route::get('/data_customer','KetuaController@customer');
Route::get('/data_validasi','KetuaController@validasi');
Route::get('/data_hutang','KetuaController@hutang');

//USER
Route::get('/homes', 'DaftarController@home');
Route::get('/biodata','DaftarController@biodata');
Route::post('/update_biodata', 'DaftarController@update_biodata');
Route::get('/riwayat','DaftarController@riwayat');
Route::get('/detail_riwayat/{id}','DaftarController@detail_riwayat');

//ADMIN TAFSIR
Route::get('/home_tafsir', 'TafsirController@home');
Route::get('/tafsir', 'TafsirController@tafsir');
Route::post('/perhitungan', 'TafsirController@perhitungan');
Route::get('/survey_pinjam','PinjamController@survey');
Route::get('/validasi_pinjam/{id}', 'PinjamController@update');
Route::post('/validasi','PinjamController@validasi');
Route::get('/transaksi_pinjam','PinjamController@transaksi');
Route::get('/proses_pinjam/{id}','PinjamController@proses');
Route::post('/hutang','PinjamController@hutang');
Route::get('/utang_pinjam','PinjamController@utang_pinjam');
Route::get('/detail/{id}','PinjamController@detail');
Route::get('/pdf/{id}','PinjamController@getPDF');
Route::get('/vista','PinjamController@pdf');
// Route::get('/kriteria_tafsir', 'TafsirController@kriteria');
// Route::get('/subkriteria_tafsir', 'TafsirController@subkriteria');

//ADMIN BAYAR
Route::get('/home_bayar','BayarController@home');
Route::get('/pembayaran','BayarController@pembayaran');
Route::get('/transaksi/{id}', 'BayarController@transaksi');
Route::post('/pembayaran_transaksi','BayarController@pembayarantransaksi');
Route::get('/detail_pinjam','BayarController@detailpinjaman');
Route::get('/detailnya/{id}','BayarController@detailnya');
