<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Matkul;

use Yajra\Datatables\Datatables;


class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('matkul.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Matkul::orderBy('id', 'desc')->get();

        return Datatables::of($data)->addIndexColumn()->addColumn('action', function ($id){

            return '<a href="#" class="btn btn-xs btn-primary  edit-matkul"  did="'.$id->id.'"><i class="fa fa-pencil"></i> Edit</a>'
            ." ".
            '<a href="#" class="btn btn-xs btn-danger  hapus-matkul" did="'.$id->id.'">Hapus</a>';

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

            if($request->input('aksi')==0) {

                $id=$request->input('id_matkul');

                $result=Matkul::where('id',$id)->update(
                    ['nama_matkul'=> $request->get('nama'),'keterangan'=> $request->get('keterangan')]);

                if($result){
                    exit (json_encode(array('Sukses', 'Update Data berhasil', 'success')));
                }else{
                    exit(json_encode(array('Ups', 'Update Data tidak berhasil', 'error')));

                }

            }elseif($request->input('aksi')==1) {
            
                   $result= Matkul::create(['nama_matkul'=> $request->get('matakuliah'),'jml_max'=> $request->get('keterangan')]);

                   if($result){
                    exit(json_encode(array('Sukses', 'Tambah Data <b>'.$request->get('nama').'</b> berhasil ', 'success')));
                }else{
                    exit(json_encode(array('Ups', 'Tambah Data tidak berhasil', 'error')));

                }

        }

    }

    if ($request->has('json_matkul')){

        $id=$request->get('json_matkul');

        $edit =Matkul::where('id', $id)->get();

        return (json_encode($edit));
    }

    if ($request->has('hapus_matkul')) {

        $id=$request->get('hapus_matkul');

        $data=Matkul::where('id',$id)->first();

        $result=Matkul::where('id',$id)->delete();

        if($result){
            exit(json_encode(array('Sukses', ' Hapus nama  matkul <b>'.$data->nama_matkul.'</b> berhasil', 'success')));
        }else{
            exit(json_encode(array('Ups', 'Hapus nama  matkul <b>'.$data->nama_matkul.'</b>  tidak berhasil', 'error')));
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
