<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Quote;

use Yajra\Datatables\Datatables;

use File;

class QuoteController extends Controller
{
	public function login()
	{
		$data = Quote::get();

		return view('login', ['data'=>$data]);
	}

	public function index()
	{
		return view('quote.quote');
	}

	public function create()
	{
		$data = Quote::orderBy('id', 'desc')->get();

		return Datatables::of($data)
		->addIndexColumn()
		->addColumn('action', function ($id){
			return '
			<div class="form-button-action">
			<button type="button" data-toggle="tooltip" title="" did="'.$id->id.'" class="btn btn-link btn-primary btn-lg edit-quote" data-original-title="Edit Task">
			<i class="fa fa-edit"></i>
			</button>
			<button type="button" data-toggle="tooltip" title="" did="'.$id->id.'" class="btn btn-link btn-danger hapus-quote" data-original-title="Remove">
			<i class="fa fa-times"></i>
			</button>
			</div>';
		})
		->addColumn('foto', function ($data) { 
			return '
			<div class="avatar">
			<img src="template/assets/img/tokoh/'.$data["foto"].'" alt="..." class="avatar-img rounded-circle">
			</div>
			';
		})->rawColumns(['foto'], ['action'])->make(true);
	}

	public function store(Request $request)
	{
		if($request->has('aksi'))
		{
			if($request->input('aksi')==0) {

				$id = $request->input('id_quote');

				if($request->hasfile('foto')){

					$data = Quote::where('id', $id)->first();

					$image_path = 'template/assets/img/tokoh/'.$data['foto'];

					if(File::exists($image_path)) {
						File::delete($image_path);
					}

					$file = $request->file('foto');
					$extension = $file->getClientOriginalExtension();
					$filename = time() .'.'. $extension;
					$file->move('template/assets/img/tokoh/', $filename);

					$result=Quote::where('id', $id)->update([
						'nama'=> $request->get('nama'),
						'foto'=> $filename,
						'text_quote'=> $request->get('quote'),
					]);
				}else{
					$result=Quote::where('id', $id)->update([
						'nama'=> $request->get('nama'),
						'text_quote'=> $request->get('quote'),
					]);
				}

				if($result){
					exit (json_encode(array('Sukses', 'Update Quote berhasil', 'success')));
				}else{
					exit(json_encode(array('Ups', 'Update Quote tidak berhasil', 'error')));
				}

			}elseif($request->input('aksi')==1) {

				if($request->hasfile('foto')){
					$file = $request->file('foto');
					$extension = $file->getClientOriginalExtension();
					$filename = time() .'.'. $extension;
					$file->move('template/assets/img/tokoh/', $filename);
				}

				$result = Quote::create([
					'foto'=> $filename,
					'nama'=> $request->get('nama'), 
					'text_quote'=> $request->get('quote')
				]);

				if($result){
					exit(json_encode(array('Sukses', 'Tambah Quote <b>'.$request->get('nama').'</b> berhasil ', 'success')));
				}else{
					exit(json_encode(array('Ups', 'Tambah Quote tidak berhasil', 'error')));
				}

			}
		}

		if ($request->has('json_quote')){

			$id=$request->get('json_quote');

			$edit =Quote::where('id', $id)->get();

			return (json_encode($edit));
		}

		if ($request->has('hapus_quote')) {

			$id=$request->get('hapus_quote');

			$data=Quote::where('id',$id)->first();

			$result=Quote::where('id',$id)->delete();

			if($result){
				exit(json_encode(array('Sukses', ' Hapus Quote <b>'.$data->nama.'</b> berhasil', 'success')));
			}else{
				exit(json_encode(array('Ups', 'Hapus Quote <b>'.$data->nama.'</b>  tidak berhasil', 'error')));
			}
		}
	}
}
