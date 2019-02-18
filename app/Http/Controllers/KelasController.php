<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kelas;

use App\User;

use App\Matkul;

use App\GrubSoal;

use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $smt=['Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan'];

      $matkul=Matkul::orderBy('id','desc')->get();

      $dosen=User::where('id_role','=',3)->get();

      return view('adminkelas.index',compact('dosen','matkul','smt'));
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

          $rand = getName(6);

          $kelas= new Kelas;
          $kelas->id_matkul=$request->get('id_matkul');
          $kelas->jml_max=$request->get('jml_max');
          $kelas->id_user=$request->get('id_user');
          $kelas->jadwal=$request->get('jadwal');
          $kelas->semester=$request->get('semester');
          $kelas->Token=$rand;
          $kelas->save();

          $grupkelas= new GrubSoal();

          $grupkelas->id_kelas=$kelas->id;

          $result= $grupkelas->save();

          if($result){
            exit(json_encode(array('Sukses', 'Tambah Data berhasil ', 'success')));
          }else{
            exit(json_encode(array('Ups', 'Tambah Data tidak berhasil', 'error')));

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
