<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Kelas;

use App\Matkul;

use App\GrubKelas;

use Auth;


use Illuminate\Support\Facades\Redirect;


use Yajra\Datatables\Datatables;

class GrupkelasController extends Controller
{

 public function index()
 {

   if(Auth::user()->id_role == '1') {
     \Alert::info('Oopss..', 'jangan nakal yaaa ....');
     return redirect()->to('/jurusan');
   }

   $mahasiswa=User::where('id_role','=',4)->orderBy('id','desc')->get();

   $matkul=Kelas::get();

     // $kelas= $matkul->KelasMatkul->nama_matkul;


   return view('grupkelas.index',compact('mahasiswa','matkul'));
 }


 public function create()
 {

  $data=GrubKelas::groupBy('grupkelas_id')->havingRaw('COUNT(*)')->get();

  return Datatables::of($data)->addIndexColumn()->addColumn('action', function ($id){

    return '<a href="/grupkelas/'.$id->grupkelas_id.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>' ." ".
    '<a href="#" class="btn btn-xs btn-info  lihat-mhs" did="'.$id->id.'">Lihat</a>';;
    
  })->addColumn('nama', function ($data){
    return  $data->GrubKelasKelas->KelasUser->pengguna['nama'];
  })->addColumn('matkul', function ($data){
    return  $data->GrubKelasKelas->KelasMatkul['nama_matkul'];
  })->make(true);
}

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
    $grupkelas_id = GrubKelas::max('grupkelas_id');
    if (!$grupkelas_id) {
      $grupkelas_id = 1;
    } else {
      $grupkelas_id = $grupkelas_id + 1;
    }

    $token =$kelas->Token;

    if ($request->get('token') == $token) {

     foreach ($request->get('id_user') as $userid) {

      $grubkelas = new GrubKelas();

      $grubkelas->id_user=$userid;

      $grubkelas->id_kelas=$request->get('matkul');

      $grubkelas->grupkelas_id=$grupkelas_id;

      $result= $grubkelas->save();
    }

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

  $id = $request->get('json_grupkelas');

  $data = GrubKelas::where('grupkelas_id',$id)->get();

  $id_user = [];
  foreach ($data as $datas) {

    $id_user[] = $datas->id_user;
  }

  $mahasiswa=User::where('id_role','=',4)->orderBy('id','desc')->get();


  $output='';

  $output.='<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Mahasiswa<span class="required-label">*</span></label>
  <div class="col-lg-6 col-md-12 col-sm-12">
  <select  name="mhs[]" class="form-control multiple" multiple="multiple" style="width:100%;">';

  foreach ($mahasiswa as $mhs) {
    if (in_array($mhs->id,$id_user)) {
      $output.='<option  value="'.$mhs->id.'" selected>'.$mhs->name.'</option>';
    }else{

      $output.='<option  value="'.$mhs->id.'">'.$mhs->name.'</option>';
    }

  }
  $output.='</select> </div>';

  $array=array('data' => $data, 'data1' => $output);

  return (json_encode($array));

}

if ($request->has('hapus_grupkelas')) 
  $id=$request->get('hapus_grupkelas');{

    $data=GrubKelas::where('id',$id)->first();
    $result=GrubKelas::where('id',$id)->delete();
    if($result){
      exit(json_encode(array('Sukses', ' Hapus nama  kelas  berhasil', 'success')));
    }else{
      exit(json_encode(array('Ups', 'Hapus nama  kelas  tidak berhasil', 'error')));
    }

  }
}

public function edit($id)
{

 if(Auth::user()->id_role == '1') {
   \Session::flash('flash_message', 'anda tidak bisa masuk ke sini!');
   return redirect()->to('/');
 }

 $edit = GrubKelas::where('grupkelas_id', $id)->get();


 $mahasiswa=User::where('id_role','=',4)->orderBy('id','desc')->get();

 $matkul=Kelas::get();

 $id_user = [];
 foreach ($edit as $ed) {

  $id_user[] = $ed->id_user;
}

return view("grupkelas.edit",compact('id_user','edit','matkul','mahasiswa'));
}
public function update(Request $request, $id)
{
  $id_kelas = $request->id_kelas;

  $grupkelas_id = $request->id;

  $members = $request->id_user;

  $edit = GrubKelas::where('grupkelas_id', $grupkelas_id)->first();

  // $kelas=$edit->id_kelas;

  // $kelasmhs=Kelas::where('id_kelas',$kelas)->get();

  // $Token=$kelasmhs->Token;

  // $token=$request->get('token');


  if($edit) {
    $oldMembers = GrubKelas::where('grupkelas_id', $grupkelas_id)->get(['id_user']);

    foreach ($oldMembers as $oldMember) {
      $oldmembers[] = $oldMember->id_user;
    }
    $oldSize = count($oldmembers);
    $newSize = count($members);

    if ($oldSize < $newSize) {
                  //add the remainder
      $idsToAdd = array_diff($members, $oldmembers);

      foreach ($idsToAdd as $add) {
        $grupkelas = new GrubKelas();
        $grupkelas->id_kelas = $request->id_kelas;
        $grupkelas->grupkelas_id = $grupkelas_id;
        $grupkelas->id_user =$add;
        $grupkelas->save();
      }
        \Alert::success('Sukses','Berhasil Tambhakan data.');
    } elseif($oldSize > $newSize) {
                  //delete the remainde
     $idsToDelete = array_diff($oldmembers, $members);
     \DB::table('tb_grub_kelas')->where('grupkelas_id', $grupkelas_id)->whereIn('id_user', $idsToDelete)->delete();
       \Alert::success('Sukses','Berhasil hapus data.');
     // \Session::flash('flash_message', 'Data Mahasiswa berhasil dihapus!');
   }else
   {
    $grupkelas = GrubKelas::where('grupkelas_id', $grupkelas_id)->first();
    $grupkelas->id_kelas = $id_kelas;
    $grupkelas->grupkelas_id = $grupkelas_id;
    $grupkelas->update();

    \Alert::success('Sukses','Berhasil update data.');
  }

}
else
{
   \Alert::success('Sukses','Data Mahasiswa tidak ditemukan');
}

return redirect('/grupkelas');
}


}
