<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;

use App\Pengguna;

use App\UserRole;

use App\User;

use App\Jurusan;

use Yajra\Datatables\Datatables;

class MhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan=Jurusan::get();
        $smt=['Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan'];

        return view('mahasiswa.index',compact('jurusan','smt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Datatables::of(User::query()->where('id_role','=',4)->orderBy('id','desc')->get())->addIndexColumn()->addColumn('action', function ($id){

          return '<a href="#" class="btn btn-xs btn-primary  edit-mahasiswa"  did="'.$id->pengguna['id'].'"><i class="fa fa-edit"></i> Edit</a>'
          ; 
      })->addColumn('nim', function($data){
          return $data->pengguna['no_induk'];
      })->addColumn('kelas', function($data){
          if($data->pengguna['kelas']==1) {
            return 'Pagi';
        }elseif($data->pengguna['kelas']==2){
         return 'Sore';
     }
 })->addColumn('semester', function($data){
    return $data->pengguna['semester'];
})->addColumn('notlp', function($data){
    return $data->pengguna['no_tlp'];
})->addColumn('name', function($data){
    return $data->pengguna['nama'];
})->addColumn('email', function($data){
    return $data->pengguna['email'];
})->addColumn('jurusan', function($data){
    return $data->pengguna->PenggunaJurusan->nama;
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

          $id=$request->input('id_mahasiswa');

          $pengguna =Pengguna::where('id',$id)->first();

          $pengguna->nama = $request->nama;

          $pengguna->no_induk = $request->nim;

          $pengguna->no_tlp = $request->notlp;

          $pengguna->email =$request->email;

          $pengguna->kelas =$request->kelas;

          $pengguna->id_jurusan =$request->jurusan;

          $pengguna->semester =$request->semester;

          $result=$pengguna->save();

          if($result){
            exit (json_encode(array('Sukses', 'Update Data berhasil', 'success')));
        }else{
            exit(json_encode(array('Ups', 'Update Data tidak berhasil', 'error')));

        }

    }elseif($request->input('aksi')==1) {

          //user

      $count=User::where('email',$request->input('email'))->count();
      if ($count>0) {
        exit(json_encode(array('Oppss', ' Email : <b>'.$request->input('email').'</b> sudah Terdaftar', 'info')));
    }


    $warna=array('bg-success','bg-danger','bg-secondary','bg-primary','bg-info','bg-dark');

    $rand=array_random($warna);

    $user = new User;

    $user->name =$request->get('nama');

    $user->email = $request->get('email');

    $user->id_role = 4;

    $user->password = bcrypt('123456');

    $user->color = $rand;

    $user->save();

           //pengguna

    $pengguna = new Pengguna;

    $pengguna->nama = $request->nama;

    $pengguna->no_induk = $request->nim;

    $pengguna->no_tlp = $request->notlp;

    $pengguna->email =$request->email;

    $pengguna->kelas =$request->kelas;

    $pengguna->id_jurusan =$request->jurusan;

    $pengguna->id_user =$user->id;

    $pengguna->semester =$request->semester;

    $pengguna->save();

           //User role

    $userRole          = new UserRole();

    $userRole->role_id = 4;

    $userRole->user_id = $user->id;

    $userRole->save();

    return json_encode(array('Sukses', 'Tambah Data <b>'.$request->get('nama').'</b> berhasil ', 'success'));

}

}

if ($request->has('json_mahasiswa')){

    $id=$request->get('json_mahasiswa');

    $edit =Pengguna::where('id', $id)->get();

    return (json_encode($edit));
}

if ($request->has('hapus_mahasiswa')) {

    $id=$request->get('hapus_mahasiswa');

    $data=Pengguna::where('id',$id)->first();

    $result=Pengguna::where('id',$id)->delete();

    if($result){
      exit(json_encode(array('Sukses', ' Hapus nama mahasiswa <b>'.$data->nama_pengguna.'</b> berhasil', 'success')));
  }else{
      exit(json_encode(array('Ups', 'Hapus nama mahasiswa <b>'.$data->nama_pengguna.'</b>  tidak berhasil', 'error')));
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
