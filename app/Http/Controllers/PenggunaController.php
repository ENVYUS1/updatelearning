<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;

Use App\Pengguna;

use App\UserRole;

use App\User;

use Yajra\Datatables\Datatables;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=Role::where('id','!=', 4)->get();

        return view('pengguna.index',compact('role'));
    }

    /**
     * Show the form for creating a new resource.s
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

       return Datatables::of(User::query()->whereIn('id_role',['1','2','3'])->orderBy('id','desc')->get())->addIndexColumn()->addColumn('action', function ($data){
        return '<a href="#" class="btn btn-xs btn-primary  edit-pengguna"  did="'.$data->pengguna['id'].'"><i class="fa fa-edit"></i>Edit</a>';  
    })->addColumn('status', function($data){
        return $data->role->role['name'];
    })->addColumn('nip', function($data){
        return $data->pengguna->no_induk;
    })->addColumn('name', function($data){
       
        return '<div class="avatar avatar-sm"><span class="avatar-title rounded-circle border border-white '.$data->color.'">'.substr($data->name,0,1).'</span></div>&nbsp;&nbsp;' .$data->pengguna['nama'];
    })->addColumn('email', function($data){
        return $data->pengguna['email'];
    })->addColumn('no_tlp', function($data){
        return $data->pengguna['no_tlp'];
    })->rawColumns(['nip','action','name'])->make(true);
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

            $id=$request->input('id_pengguna');

            // $result=Pengguna::where('id',$id)->update(
            //     ['nama'=> $request->$request->nama,'no_induk'=> $request->nip,'not_tlp'=>$request->notlp,'email'=>$request->email,'id_user'=>$request->id_user]);

            $pengguna=Pengguna::where('id',$id)->first();

            $pengguna->nama = $request->nama;

            $pengguna->no_induk = $request->nip;

            $pengguna->no_tlp = $request->notlp;

            $pengguna->email =$request->email;

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

        $user = new User();

        $user->name =$request->get('nama');

        $user->email = $request->get('email');

        $user->id_role = $request->get('role');

        $user->password = bcrypt('123456');

        $user->color = $rand;

        $user->save();

         //pengguna

        $pengguna = new Pengguna();

        $pengguna->nama = $request->nama;

        $pengguna->no_induk = $request->nip;

        $pengguna->no_tlp = $request->notlp;

        $pengguna->email =$request->email;

        $pengguna->id_user = $user->id;

        $pengguna->save();

         //User role

        $userRole          = new UserRole();

        $userRole->role_id = $request->role;

        $userRole->user_id = $user->id;

        $result=$userRole->save();

        if($result){
            exit (json_encode(array('Sukses', 'Tambah Data <b>'.$request->get('nama').'</b> berhasil ', 'success')));
        }else{
            exit(json_encode(array('Oppss', 'Tambah Data <b>'.$request->get('nama').'</b> tidak berhasil ', 'error')));

        }

    }

}

if ($request->has('json_pengguna')){

    $id=$request->input('json_pengguna');

    $edit =Pengguna::where('id', $id)->get();

    foreach ($edit as $edits) {

      $id_role=$edits->id_user;
  }

  $status =User::where('id', $id_role)->get();

  $array=array('data'=>$edit,'data1'=>$status);

  return  json_encode($array);
}

if ($request->has('hapus_pengguna')) {

    $id=$request->get('hapus_pengguna');

    $data=Pengguna::where('id',$id)->first();

    $result=Pengguna::where('id',$id)->delete();

    if($result){
        exit(json_encode(array('Sukses', ' Hapus nama  pengguna <b>'.$data->nama_pengguna.'</b> berhasil', 'success')));
    }else{
        exit(json_encode(array('Ups', 'Hapus nama  pengguna <b>'.$data->nama_pengguna.'</b>  tidak berhasil', 'error')));
    }

}
}

}
