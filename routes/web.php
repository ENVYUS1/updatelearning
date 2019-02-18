<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['guest']], function ()
{

	Route::get('/', 'AuthController@showLogin');

	Route::post('/', 'AuthController@doLogin');

	Route::get('reset-password', 'AuthController@resetPassword');

	Route::post('reset-password', 'AuthController@processPasswordReset');


});

Route::group(['middleware' => ['auth']], function ()
{


//jurusan
	Route::get('/jurusan', 'JurusanController@index');

	Route::get('/data-jurusan', 'JurusanController@datajurusan');

	Route::POST('/tambah-jurusan','JurusanController@tambahjurusan');

	//logout

	Route::get('logout', 'AuthController@doLogout');


//role

	Route::get('/role', 'RoleController@index');

	Route::get('/data-role', 'RoleController@create');

	Route::POST('/tambah-role','RoleController@store');


//matkul

	Route::get('/matkul', 'MatkulController@index');

	Route::get('/data-matkul', 'MatkulController@create');

	Route::POST('/tambah-matkul','MatkulController@store');

//pengguna

	Route::get('/pengguna', 'PenggunaController@index');

	Route::get('/data-pengguna', 'PenggunaController@create');

	Route::POST('/tambah-pengguna','PenggunaController@store');

// Materi

	Route::get('/materi', 'MateriController@index');

	Route::get('/data-materi', 'MateriController@create');

	Route::POST('/tambah-materi','MateriController@store');


//kelas admin

	Route::get('/kelas', 'KelasController@index');

	Route::get('/data-kelas', 'KelasController@create');

	Route::POST('/tambah-kelas','KelasController@store');

//mahsiswa

	Route::get('/mahasiswa', 'MhsController@index');

	Route::get('/data-mahasiswa', 'MhsController@create');

	Route::POST('/tambah-mahasiswa','MhsController@store');


//Grup Kelas

	Route::get('/grupkelas', 'GrupkelasController@index');

	Route::get('/data-grupkelas', 'GrupkelasController@create');

	Route::POST('/tambah-grupkelas','GrupkelasController@store');

//soal

	Route::get('/soal', 'SoalController@index');

	Route::get('/data-soal', 'SoalController@create');

	Route::POST('/tambah-soal','SoalController@store');

//materi

	Route::get('/materi', 'MateriController@index');

	Route::get('/data-materi', 'MateriController@create');

	Route::POST('/tambah-materi','MateriController@store');


});