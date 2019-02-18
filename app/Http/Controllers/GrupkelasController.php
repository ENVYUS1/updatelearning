<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Kelas;

use App\Matkul;

use App\GrubKelas;


use Yajra\Datatables\Datatables;

class GrupkelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     $mahasiswa=User::where('id_role','=',4)->orderBy('id','desc')->get();

     $matkul=Kelas::get();

     // $kelas= $matkul->KelasMatkul->nama_matkul;


     return view('grupkelas.index',compact('mahasiswa','matkul'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $data=Kelas::groupBy('kelas_id')->havingRaw('COUNT(*)')->get();

      $data=GrubKelas::get();

      return Datatables::of($data)->addIndexColumn()->addColumn('action', function ($id){

        return '<a href="#" class="btn btn-xs btn-primary  edit-grupkelas"  did="'.$id->id.'"><i class="fa fa-pencil"></i> Edit</a>'
        ." ".
        '<a href="#" class="btn btn-xs btn-danger  hapus-grupkelas" did="'.$id->id.'">Hapus</a>';

      })->addColumn('nama', function ($data){
        return  $data->GrubKelasUser['name'];
      })->addColumn('matkul', function ($data){
        return  $data->GrubKelasKelas->KelasMatkul['nama_matkul'];
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

          $id=$request->input('id_grupkelas');

          $grup=GrubKelas::where('id',$id)->first();

          $id_kelas=$grup->id_kelas;

          $kelas=Kelas::where('id',$id_kelas)->first();

          $kelas1=Kelas::where('id',$request->input('matkul'))->first();

          $token1 =$kelas1->Token;

          $token =$kelas->Token;

          if ($request->token == $token) {

            $grupkelas=GrubKelas::where('id',$id)->first();

            $grupkelas->id_user = $request->get('mhs');

            $grupkelas->id_kelas = $request->get('matkul');

            $result = $grupkelas->save();

            if($result){
              exit (json_encode(array('Sukses', 'Update Data berhasil', 'success')));
            }else{
              exit(json_encode(array('Ups', 'Update Data tidak berhasil', 'error')));

            }

          }elseif($request->get('token') == $token1){

           $grupkelas= GrubKelas::where('id',$id)->first();

           $grupkelas->id_user = $request->get('mhs');

           $grupkelas->id_kelas = $request->get('matkul');

           $result = $grupkelas->save();

           if($result){
            exit (json_encode(array('Sukses', 'Update Data berhasil', 'success')));
          }else{
            exit(json_encode(array('Ups', 'Update Data tidak berhasil', 'error')));

          }

        }else{

          exit(json_encode(array('Oppss', 'Token Salah ', 'error')));

        }


      }elseif($request->input('aksi')==1) {

        $kelas=Kelas::where('id',$request->input('matkul'))->first();


        $token =$kelas->Token;

        if ($request->get('token') == $token) {

          $grupkelas= new GrubKelas;

          $grupkelas->id_user = $request->get('mhs');

          $grupkelas->id_kelas = $request->get('matkul');

          $result = $grupkelas->save();

          if($result){
            exit(json_encode(array('Sukses', 'Tambah Data berhasil ', 'success')));
          }else{
            exit(json_encode(array('Ups', 'Tambah Data tidak berhasil', 'error')));

          }
        }else{

          exit(json_encode(array('Oppss', 'token Salah ', 'error')));

        }   

      }

    }

    if ($request->has('json_grupkelas')){

      $id=$request->get('json_grupkelas');

      $data=GrubKelas::where('id',$id)->get();

      return (json_encode($data));

    }

    if ($request->has('hapus_grupkelas')) {

      $id=$request->get('hapus_grupkelas');

      $data=GrubKelas::where('id',$id)->first();

      $result=GrubKelas::where('id',$id)->delete();

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
