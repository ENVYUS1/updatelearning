<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kelas;

use App\User;

use App\Matkul;

use App\GrubSoal;

use App\GrubKelas;

use App\Materi;

use App\Soal;

use App\JawabKuis;

use App\Pengguna;

use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\DB;

use Intervention\Image\Facades\Image;

class KelasController extends Controller
{
  public function index()
  {
    $smt=['Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan'];

    $matkul=Matkul::orderBy('id','desc')->get();

    $dosen=User::where('id_role','=',3)->get();

    $mahasiswa=User::where('id_role','=',4)->orderBy('id','desc')->get();

    return view('adminkelas.index',compact('dosen','matkul','smt','mahasiswa'));
  }


  public function create()
  {
      // $data=Kelas::groupBy('kelas_id')->havingRaw('COUNT(*)')->get();

    $data=Kelas::get();
    return Datatables::of($data)->addIndexColumn()->addColumn('action', function ($id){
      return '
      <a href="kelas/'.$id->Token.'/materi" data-toggle="tooltip" data-placement="top" title="lihat" class="btn btn-link btn-info btn-xs" did="'.$id->id.'"><i style="font-size:15px" class="fas fa-info-circle"></i></a>
      <a href="#" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-link btn-primary btn-xs  edit-kelas" did="'.$id->id.'"><i style="font-size:15px" class="fas fa-edit"></i></a>  <a href="#" data-toggle="tooltip" data-placement="top" title="join"  class="btn btn-link btn-primary btn-xs join-kelas" did="'.$id->id.'"><i style="font-size:15px" class="fas fa-info"></i></a>';
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

    if ($request->has('json_grubkelas')){


      $id=$request->get('json_grubkelas');

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

    if ($request->has('aksi1')) {

      $count=GrubKelas::where('id_user',$request->input('id_user'))->count();
      if ($count>0) {
        exit(json_encode(array('Ups', 'Mahasiswa  sudah terdaftar di kelas ini', 'info')));
      }

      $grupkelas_id = GrubKelas::max('grupkelas_id');
      if (!$grupkelas_id) {
        $grupkelas_id = 1;
      } else {
        $grupkelas_id = $grupkelas_id + 1;
      }
      foreach ($request->get('id_user') as $userid) {

        $grubkelas = new GrubKelas();

        $grubkelas->id_user=$userid;

        $grubkelas->id_kelas=$request->get('id_kelas');

        $grubkelas->grupkelas_id=$grupkelas_id;

        $result= $grubkelas->save();
      }

      if($result){
        exit(json_encode(array('Sukses', 'Tambah Data berhasil ', 'success')));
      }else{
        exit(json_encode(array('Ups', 'Tambah Data tidak berhasil', 'error')));

      }

    }

  }

  public function materi($id)
  {

    $kelas=Kelas::where('Token',$id)->first();

    $id_kelas=$kelas->id;

    $materis=Materi::where('id_kelas',$id_kelas)->get();


    $materi=Materi::where('id_kelas',$id_kelas)->count();

    $pengguna=GrubKelas::where('id_kelas',$id_kelas)->count();

    $grupkelas=GrubSoal::where('id_kelas',$id_kelas)->first();

    $id_grupsoal=$grupkelas->id;

    $data=Soal::groupBy('soal_id')->havingRaw('COUNT(*)')->get();

    $kuiz=count($data);

    return  view('kelas.materi', compact('id','materis','id_kelas','kelas','pengguna','materi','kuiz'));
  }

  public function mahasiswa($id)
  {

    $kelas=Kelas::where('Token',$id)->first();
    if (empty($kelas)) {
     abort('404');
   }

   $id_kelas=$kelas->id;

   $grubsoal=GrubSoal::where('id_kelas',$id_kelas)->first();

   $idgrubsoal=$grubsoal->id;

   $materi=Materi::where('id_kelas',$id_kelas)->count();

   $pengguna=GrubKelas::where('id_kelas',$id_kelas)->count();

   $grupkelas=GrubSoal::where('id_kelas',$id_kelas)->first();

   $id_grupsoal=$grupkelas->id;

   $data=Soal::groupBy('soal_id')->havingRaw('COUNT(*)')->get();

   $kuiz=count($data);

   $mahasiswa=GrubKelas::where('id_kelas',$id_kelas)->get();

   $maha=User::where('id_role','=',4)->orderBy('id','desc')->get();

   return  view('kelas.mahasiswa', compact('id','mahasiswa','id_kelas','kelas','pengguna','materi','kuiz','maha'));
 }


 public function tambahmahasiswa(Request $request)
 {
   $count=GrubKelas::where('id_user',$request->input('id_user'))->count();
   if ($count>0) {
     \Alert::info('Info','Data Mahasiswa sudah ada');
     return redirect()->back();
   }
   $grupkelas_id = GrubKelas::max('grupkelas_id');
   if (!$grupkelas_id) {
    $grupkelas_id = 1;
  } else {
    $grupkelas_id = $grupkelas_id + 1;
  }
  foreach ($request->get('id_user') as $userid) {

    $grubkelas = new GrubKelas();

    $grubkelas->id_user=$userid;

    $grubkelas->id_kelas=$request->get('id_kelas');

    $grubkelas->grupkelas_id=$grupkelas_id;

    $result= $grubkelas->save();
  }

  if ($result) {
    \Alert::success('Sukses','Sukses Tambah data Mahasiswa');
    return redirect()->back();
  }else{

   \Alert::error('oppsss',' Tambah data Mahasiswa gagal');
   return redirect()->back();
 }

}



public function informasi($id)
{

 $kelas=Kelas::where('Token',$id)->first();

 $id_kelas=$informasi->id;

 $informasi=Informasi::where('id_kelas',$id_kelas)->get();

 return  view('kelas.informasi', compact('id','informasi','id_kelas','pengguna','materi','kuiz'));
}

public function kuis($id)
{

 $kelas=Kelas::where('Token',$id)->first();

 if (count($kelas)<1) {
   abort('404');
 }

 $id_kelas=$kelas->id;

 $grupkelas=GrubSoal::where('id_kelas',$id_kelas)->first();

 $id_grupsoal=$grupkelas->id;

 $kuis=Soal::groupBy('soal_id')->havingRaw('COUNT(*)')->get();

 $materi=Materi::where('id_kelas',$id_kelas)->count();

 $pengguna=GrubKelas::where('id_kelas',$id_kelas)->count();

 $data=Soal::groupBy('soal_id')->havingRaw('COUNT(*)')->get();

 $kuiz=count($data);

 $index=1;

 return  view('kelas.kuis', compact('id','id_kelas','kuis','kelas','materi','pengguna','kuiz','id_grupsoal','index'));
}

 //hapus kuis

public function hapuskuis($id,$idsoal)
{

 $hapus= Soal::where('soal_id',$idsoal)->delete();


 \Alert::success('Sukses', 'Data Berhasil di hapus');

 return redirect()->back();

}


public function hapusmahasiswa($id,$idmhs)
{

 $hapus= User::whereId($idmhs)->delete();


 \Alert::success('Sukses', 'Data Berhasil di hapus');

 return redirect()->back();

}

public function lihatmhs(Request $request)
{

  if ($request->has('json_lhtmhs')){

    $id=$request->get('json_lhtmhs');

    $data=Pengguna::where('id_user',$id)->first();




    $output=array('inisial'=>firstSentence($data->nama),'warna'=>$data->PenggunaUser->color,'data'=>$data);

    return (json_encode($output));

  }
}


public function tentang($id)
{

 $kelas=Kelas::where('Token',$id)->first();
 if (empty($kelas)) {
   abort('404');
 }

 $id_kelas=$kelas->id;

 $jadwal=$kelas->jadwal;

 if ($jadwal==1) {
  $masuk='pagi';
}else{

  $masuk='sore';
}

$grubsoal=GrubSoal::where('id_kelas',$id_kelas)->first();

$idgrubsoal=$grubsoal->id;

$materi=Materi::where('id_kelas',$id_kelas)->count();

$pengguna=GrubKelas::where('id_kelas',$id_kelas)->count();

$grupkelas=GrubSoal::where('id_kelas',$id_kelas)->first();

$id_grupsoal=$grupkelas->id;

$data=Soal::groupBy('soal_id')->havingRaw('COUNT(*)')->get();

$kuiz=count($data);

return  view('kelas.tentang', compact('id','id_kelas','kelas','kuiz','materi','pengguna','masuk'));
}


// public function kuislht()
// {
//  return view('kelas.list_kuis');
// }

public function LihatKuis($id,$grub)
{

  $soal=Soal::where('id_grub_soal',$grub)->first();


  $listsoal=Soal::where('soal_id',$soal->soal_id)->get();

  $data=Kelas::groupBy('kelas_id')->havingRaw('COUNT(*)')->get();

  $id_kelas=$kelas->id;

  $materi=Materi::where('id_kelas',$id_kelas)->get();

  return  view('kelas.materi', compact('id','materi','id_kelas'));
}


// json soal jawab soal

public function jawabsoal(Request $request)
{


  if ($request->has('json_jawabsoal')){

    $id=$request->get('json_jawabsoal');

    $soal=Soal::where('id',$id)->first();

    return (json_encode($soal));

  }

}

public function lihatjawabkuis($id,$soal)
{
  $i=1;

  $hitung=Soal::where('soal_id',$soal)->where('status',2)->get();

  $soal=Soal::where('soal_id',$soal)->where('status',1)->get();

  foreach($soal as $soals){
    $idsoal=$soals->id;

  }


//jawaban
  $jawab=JawabKuis::where('id_soal',$idsoal)->get();

  dd($jawab);


  return view('kelas.list_kuis',compact('soal','i','idsoal','id','hitung'));
}

//jawaban kuis

public function jawabantext(Request $request)
{

  $request->validate([

    'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg,pdf,docx,doc|max:5120'
  ]);
  $jawabkuis_id = JawabKuis::max('jawabkuis_id');
  if (!$jawabkuis_id) {
    $jawabkuis_id = 1;
  } else {
    $jawabkuis_id = $jawabkuis_id + 1;
  }
  $id_soal=$request->get('id_soal');

  $id_user=$request->get('id_user');

  $soal=$request->get('soal');

  Soal::where('id',$id_soal)->update([

    'status'=> 2

  ]);


  if ($request->file('file')) {
    for ($i=0; $i < count($request->file('file')) ; $i++) { 
      $files = $request->file('file')[$i];
      $ext = $files->getClientOriginalExtension();
      $newName = rand(100000,1001238912).".".$ext;
      $files->move('file-soal',$newName);

      $soal1=new JawabKuis();

      $soal1->id_soal=$id_soal;

      $soal1->id_user=$id_user;

      $soal1->jawaban=$soal ;

      $soal1->jawabkuis_id=$jawabkuis_id;

      $soal1->foto=$newName;

      $result=$soal1->save();

    }

    if ($result) {
     \Alert::success('Sukeses','Sukses Tambahakan data');
     return redirect()->back();
   }else{
     \Alert::error('Error','Tambahkan data tidak berhasil');
     return redirect()->back();

   }


 }elseif($request->file('file')==''){


   Soal::where('id',$id_soal)->update([

    'status'=>2

  ]);
   $soal1=new JawabKuis();

   $soal1->id_soal=$id_soal;

   $soal1->id_user=$id_user;

   $soal1->jawaban=$soal ;

   $soal1->jawabkuis_id=$jawabkuis_id;

   $result=$soal1->save();



   if ($result) {
     \Alert::success('Sukeses','Sukses Tambahakan data');
     return redirect()->back();
   }else{
     \Alert::error('Error','Tambahkan data tidak berhasil');
     return redirect()->back();

   }


 }


}

  //tambah soal di kelas

public function tambahsoal(Request $request)
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

      if ($request->file('file')){

       $soal_id =Soal::max('soal_id');
       if (!$soal_id) {
        $soal_id = 1;
      } else {
        $soal_id = $soal_id + 1;
      }
      for ($i=0; $i < count($request->get('soal')) ; $i++) { 
        $files = $request->file('file')[$i];
        $ext = $files->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $files->move('file-soal',$newName);
        $soal = new Soal;
        // $soal->nama_soal = $request->get('nama');
        $soal->id_grub_soal = $request->get('id_grubsoal');
        $soal->ket_soal = $request->get('soal')[$i];
        $soal->file_soal = $newName;
        $soal->soal_id = $soal_id;
        $soal->waktu = $request->get('waktu');
        $result = $soal->save();
      }
      if($result){
        exit(json_encode(array('Sukses', 'Tambah Data berhasil ', 'success')));
      }else{
        exit(json_encode(array('Ups', 'Tambah Data tidak berhasil', 'error')));
      }

    }

    elseif($request->file('file')==''){

      $index=0;
      foreach ($kuis as $kuisis) {
       $soal= new Soal;
       $soal->nama_soal=$request->get('nama');
       $soal->id_grub_soal=$request->get('id_grubsoal');
       $soal->ket_soal=$kuisis;
       $soal->waktu=$request->get('waktu');
       $result=$soal->save();
     }
     if($result){
      exit(json_encode(array('Sukses', 'Tambah Data berhasil ', 'success')));
    }else{
      exit(json_encode(array('Ups', 'Tambah Data tidak berhasil', 'error')));

    }

  }

}

}


}


}
