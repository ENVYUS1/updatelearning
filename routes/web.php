<?php

Route::group(['middleware' => 'throttle:60,1'], function ()
{

	Route::get('/', 'AuthController@showLogin');

	Route::post('/', 'AuthController@doLogin');

	Route::get('reset-password', 'AuthController@resetPassword');

	Route::post('reset-password', 'AuthController@processPasswordReset');

});

Route::group(['middleware' => ['auth']], function ()
{

	Route::get('/tentang', 'KelasController@tentang');

//jurusan
	Route::get('/jurusan', 'JurusanController@index')->name('jurusan');

	Route::get('/data-jurusan', 'JurusanController@datajurusan');

	Route::POST('/tambah-jurusan','JurusanController@tambahjurusan');

	//logout

	Route::get('logout', 'AuthController@doLogout');

	Route::get('/ubah-password','AuthController@ubah');

	Route::post('/ubah-password','AuthController@change');

	Route::get('profil', 'AuthController@profil');



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

	// Route::get('/kelas/informasi','KelasController@informasi');

	Route::get('/kelas/{id}/informasi','KelasController@informasi');

	Route::get('/kelas/{id}/materi', 'KelasController@materi');

	Route::get('/kelas/{id}/mahasiswa', 'KelasController@mahasiswa');

	Route::POST('/kelas/{id}/mahasiswa', 'KelasController@tambahmahasiswa');

	Route::get('/kelas/{id}/pengaturan', 'KelasController@pengaturan');

	Route::get('/kelas/{id}/kuis', 'KelasController@kuis');

	Route::get('/kelas/{id}/kuis/lihat-jawab/{soal}', 'KelasController@lihatjawabkuis');

	Route::POST('/kelas/jawabantext', 'KelasController@jawabantext');

	Route::POST('/kelas/jawabanfoto', 'KelasController@jawabanfoto');

	// Route::POST('/kelas/jawabsoal', 'KelasController@jawabsoal');

	Route::get('/kelas/{id}/kuis/hapus/{idsoal}', 'KelasController@hapuskuis');

	Route::get('/kelas/{id}/mahasiswa/hapus/{idmhs}', 'KelasController@hapusmahasiswa');

	Route::get('/kelas/{id}/kuis/{grub}', 'KelasController@LihatKuis');

	Route::POST('/lihat-mhs', 'KelasController@lihatmhs');

	Route::POST('/jawab-soal', 'KelasController@jawabsoal');



	Route::POST('/tambah-soal-mahasiswa', 'KelasController@tambahsoal');

	Route::get('/kelas/{id}/tentang', 'KelasController@tentang');

	Route::get('/kelas/{id}/tentang', 'KelasController@tentang');

	// Route::get('/kelas/{id}/tentang', 'KelasController@tentang');

//mahsiswa

	Route::get('/mahasiswa', 'MhsController@index');

	Route::get('/data-mahasiswa', 'MhsController@create');

	Route::POST('/tambah-mahasiswa','MhsController@store');


//Grup Kelas

	Route::get('/grupkelas', 'GrupkelasController@index');

	Route::get('/data-grupkelas', 'GrupkelasController@create');

	Route::POST('/tambah-grupkelas','GrupkelasController@store');

	Route::get('/grupkelas/{id}', 'GrupkelasController@edit');

	Route::POST('/grupkelas/{id}', 'GrupkelasController@update');

//soal

	Route::get('/soal', 'SoalController@index');

	Route::get('/data-soal', 'SoalController@create');

	Route::POST('/tambah-soal','SoalController@store');

//materi

	Route::get('/materi', 'MateriController@index');

	Route::get('/data-materi', 'MateriController@create');

	Route::POST('/tambah-materi','MateriController@store');

// quete
	// Route::get('/', 'QuoteController@login');

	Route::get('/quote', 'QuoteController@index');

	Route::get('/data-quote', 'QuoteController@create');

	Route::POST('/tambah-quote','QuoteController@store');

    //file manager

	Route::get('/filemanager', 'FileManagerController@index');

	Route::get('/data-filemanager', 'FileManagerController@create');

	Route::POST('/tambah-filemanager','FileManagerController@store');

  //kelas mahsiswa

	Route::get('/kelas-mahasiswa', 'KelasmahasiswaController@index');

	Route::get('/data-kelas-mahasiswa', 'KelasmahasiswaController@create');

	Route::POST('/tambah-kelas-mahasiswa','KelasmahasiswaController@store');

	//informasi

	Route::get('/kelas/informasi', 'KelasmahasiswaController@informasi');

	Route::get('/kelas/materi', 'KelasmahasiswaController@materi');

	// Route::get('/tentang', 'KelasmahasiswaController@tentang');

	Route::get('/kelas/kuis', 'KelasmahasiswaController@kuis');

	Route::get('/kelas/mahasiswa', 'KelasmahasiswaController@mahasiswa');

	Route::get('/testing', 'KelasController@kuislht');
	 

});