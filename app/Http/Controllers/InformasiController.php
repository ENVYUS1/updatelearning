<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Informasi;

use Yajra\Datatables\Datatables;


class InformasiController extends Controller
{
   public function index()
   {

    return view('kelas.informasi');

}

public function view()
{

    return view('layout.layout2');

}

public function datainformasi()
{

    $data=Informasi::orderBy('id', 'desc')->get();

    return Datatables::of($data)->addIndexColumn()->addColumn('action', function ($id){

        return '<a href="#" class="btn btn-xs btn-primary  edit-informasi"  did="'.$id->id.'"><i class="fa fa-edit"></i>Edit</a>'
        ." ".
        '<a href="#" class="btn btn-xs btn-danger  hapus-informasi" did="'.$id->id.'"><i class="fa fa-trash"></i> Hapus</a>';

    })->make(true);

}

public function tambahinformasi(Request $request)
{

    if($request->has('aksi'))
    {

        if($request->input('aksi')==0) {

            $id=$request->input('id_informasi');

            $result=Informasi::where('id',$id)->update(
                ['nama'=> $request->get('nama')]);

            if($result){
                exit (json_encode(array('Sukses', 'Update Data berhasil', 'success')));
            }else{
                exit(json_encode(array('Ups', 'Update Data tidak berhasil', 'error')));

            }

        }elseif($request->input('aksi')==1) {

            $result= Informasi::create(['nama'=> $request->get('nama')]);

            if($result){
                exit(json_encode(array('Sukses', 'Tambah Data <b>'.$request->get('nama').'</b> berhasil ', 'success')));
            }else{
                exit(json_encode(array('Ups', 'Tambah Data tidak berhasil', 'error')));

            }

        }

    }

    if ($request->has('json_informasi')){

        $id=$request->get('json_informasi');

        $edit =Informasi::where('id', $id)->get();

        return (json_encode($edit));
    }


    if ($request->has('hapus_informasi')) {

        $id=$request->get('hapus_informasi');

        $data=Informasi::where('id',$id)->first();

        $result=Informasi::where('id',$id)->delete();

        if($result){
            exit(json_encode(array('Sukses', ' Hapus nama  informasi <b>'.$data->nama.'</b> berhasil', 'success')));
        }else{
            exit(json_encode(array('Ups', 'Hapus nama  informasi <b>'.$data->nama.'</b>  tidak berhasil', 'error')));
        }
    }
}
}
