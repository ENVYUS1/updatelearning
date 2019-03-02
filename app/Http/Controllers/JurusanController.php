<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Jurusan;

use Yajra\Datatables\Datatables;

class JurusanController extends Controller
{
	public function index()
	{

		return view('jurusan.index');

	}

	public function view()
	{

		return view('layout.layout2');

	}

	public function datajurusan()
	{

		$data=Jurusan::orderBy('id', 'desc')->get();

		return Datatables::of($data)->addIndexColumn()->addColumn('action', function ($id){

			return '<a href="#" class="btn btn-xs btn-primary  edit-jurusan"  did="'.$id->id.'"><i class="fa fa-edit"></i>Edit</a>'
			." ".
			'<a href="#" class="btn btn-xs btn-danger  hapus-jurusan" did="'.$id->id.'"><i class="fa fa-trash"></i> Hapus</a>';

		})->make(true);

	}

	public function tambahjurusan(Request $request)
	{

		if($request->has('aksi'))
		{

			if($request->input('aksi')==0) {

				$id=$request->input('id_jurusan');

				$result=Jurusan::where('id',$id)->update(
					['nama'=> $request->get('nama')]);

				if($result){
					exit (json_encode(array('Sukses', 'Update Data berhasil', 'success')));
				}else{
					exit(json_encode(array('Ups', 'Update Data tidak berhasil', 'error')));

				}

			}elseif($request->input('aksi')==1) {

				$result= Jurusan::create(['nama'=> $request->get('nama')]);

				if($result){
					exit(json_encode(array('Sukses', 'Tambah Data <b>'.$request->get('nama').'</b> berhasil ', 'success')));
				}else{
					exit(json_encode(array('Ups', 'Tambah Data tidak berhasil', 'error')));

				}

			}

		}

		if ($request->has('json_jurusan')){

			$id=$request->get('json_jurusan');

			$edit =Jurusan::where('id', $id)->get();

			return (json_encode($edit));
		}

		if ($request->has('hapus_jurusan')) {

			$id=$request->get('hapus_jurusan');

			$data=Jurusan::where('id',$id)->first();

			$result=Jurusan::where('id',$id)->delete();

			if($result){
				exit(json_encode(array('Sukses', ' Hapus nama  jurusan <b>'.$data->nama.'</b> berhasil', 'success')));
			}else{
				exit(json_encode(array('Ups', 'Hapus nama  jurusan <b>'.$data->nama.'</b>  tidak berhasil', 'error')));
			}

		}

	}
}
