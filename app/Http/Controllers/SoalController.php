<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Soal;

use App\GrubSoal;

Use App\Kelas;

use Yajra\Datatables\Datatables;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    	$matkul=GrubSoal::orderBy('id','desc')->get();

    	return view('soal.index',compact('matkul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $data=Kelas::groupBy('kelas_id')->havingRaw('COUNT(*)')->get();

    	$data=Kelas::get();

    	return Datatables::of($data)->addIndexColumn()->addColumn('action', function ($id){

    		return '<a href="#" class="btn btn-xs btn-primary  edit-kelas"  did="'.$id->id.'"><i class="fa fa-pencil"></i> Edit</a>'
    		." ".
    		'<a href="#" class="btn btn-xs btn-danger  hapus-kelas" did="'.$id->id.'">Hapus</a>';

    	})->addColumn('nama', function ($nama){
    		return  $nama->KelasUser['name'];
    	})->addColumn('smt', function ($smt){
    		if ($smt->semester==1) {
    			return 'Satu';
    		}elseif ($smt->semester==2) {
    			return'Dua';
    		}elseif ($smt->semester==3) {
    			return'Tiga';
    		}elseif ($smt->semester==4) {
    			return'Empat';
    		}elseif ($smt->semester==5) {
    			return'Lima';
    		}elseif ($smt->semester==6) {
    			return'Enam';
    		}elseif ($smt->semester==7) {
    			return'Tujuh';
    		}elseif($smt->semester==8)  {
    			return'Delapan';
    		}
    	})->addColumn('jadwal', function ($jadwal){
    		if ($jadwal->jadwal==01) {
    			return 'Pagi';
    		}else{
    			return'Sore';
    		}
    	})->addColumn('matkul', function ($matkul){
    		return  $matkul->KelasMatkul->nama_matkul;
    	})->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	if($request->has('aksi'))
    	{

    		if($request->input('aksi')==0) 
    		{

    			$id=$request->input('id_kelas');

    			$result=Kelas::where('id',$id)->update([
    				'id_matkul'=> $request->get('id_matkul'),
    				'jml_max'=> $request->get('jml_max'),
    				'id_user'=> $request->get('id_user'),
    				'jadwal'=> $request->get('jadwal'),
    				'semester'=> $request->get('semester')

    			]);

    			if($result){
    				exit (json_encode(array('Sukses', 'Update Data berhasil', 'success')));
    			}else{
    				exit(json_encode(array('Ups', 'Update Data tidak berhasil', 'error')));

    			}

    		}elseif($request->input('aksi')==1) {

    			$filename = public_path('file-soal/a.png');
    			if ($request->file('file')) {
    				$file             = $request->file('file');
    				$filename         = str_random(12);
    				$fileExt          = $file->getClientOriginalExtension();
    				$allowedExtension = ['jpg', 'jpeg', 'png','doc','docx','pdf'];
    				$destinationPath  = public_path('file-soal');
    				if (!in_array($fileExt, $allowedExtension)) {
    					exit(json_encode(array('Oppss', 'Ekstensi tidak dibolehkan ', 'info')));
    				}elseif($request->file('file')->getSize()>5000000){
    					exit(json_encode(array('Oppss', 'Ukuran tidak Boleh melebihi 5 MB', 'info')));
    				}
    				$filename = $filename . '.' . $fileExt;
    				$file->move($destinationPath, $filename);
    				$soal= new Soal;
    				$soal->nama_soal=$request->get('nama');
    				$soal->id_grub_soal=$request->get('id_grubsoal');
    				$soal->ket_soal=$request->get('soal');
    				$soal->file_soal=$filename;
    				$soal->waktu=$request->get('waktu');
    				$result=$soal->save();

    				if($result){
    					exit(json_encode(array('Sukses', 'Tambah Data berhasil ', 'success')));
    				}else{
    					exit(json_encode(array('Ups', 'Tambah Data tidak berhasil', 'error')));

    				}

    			}elseif($request->file('file')==''){

    				$soal= new Soal;
    				$soal->nama_soal=$request->get('nama');
    				$soal->id_grub_soal=$request->get('id_grubsoal');
    				$soal->ket_soal=$request->get('soal');
    				$soal->waktu=$request->get('waktu');
    				$result=$soal->save();

    				if($result){
    					exit(json_encode(array('Sukses', 'Tambah Data berhasil ', 'success')));
    				}else{
    					exit(json_encode(array('Ups', 'Tambah Data tidak berhasil', 'error')));

    				}

    			}elseif($request->get('soal')==''){

    				$soal= new Soal;
    				$soal->nama_soal=$request->get('nama');
    				$soal->id_grub_soal=$request->get('id_grubsoal');
    				$soal->file_soal=$filename;
    				$soal->waktu=$request->get('waktu');
    				$result=$soal->save();

    				if($result){
    					exit(json_encode(array('Sukses', 'Tambah Data berhasil ', 'success')));
    				}else{
    					exit(json_encode(array('Ups', 'Tambah Data tidak berhasil', 'error')));

    				}

    			}


    		}

    	}

    	if ($request->has('json_kelas')){

    		$id=$request->get('json_kelas');

    		$data=Kelas::where('id',$id)->get();

    		return (json_encode($data));

    	}

    	if ($request->has('hapus_kelas')) {

    		$id=$request->get('hapus_kelas');

    		$data=Kelas::where('id',$id)->first();

    		$result=Kelas::where('id',$id)->delete();

    		if($result){
    			exit(json_encode(array('Sukses', ' Hapus nama  kelas  berhasil', 'success')));
    		}else{
    			exit(json_encode(array('Ups', 'Hapus nama  kelas  tidak berhasil', 'error')));
    		}

    	}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
