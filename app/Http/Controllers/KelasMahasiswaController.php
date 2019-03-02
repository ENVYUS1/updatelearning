<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasMahasiswaController extends Controller
{
	public function index()
	{
		return view('kelas.kelas');
	}

	public function informasi()
	{
		return view('kelas.informasi');
	}

	public function materi()
	{
		return view('kelas.materi');
	}

	public function mahasiswa()
	{
		return view('kelas.mahasiswa');
	}

	public function tentang()
	{
		return view('kelas.tentang');
	}

	public function kuis()
	{
		return view('kelas.kuis');
	}
}   


