<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;

use Yajra\Datatables\Datatables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Role::orderBy('id', 'desc')->get();

        return Datatables::of($data)->addIndexColumn()->addColumn('action', function ($id){

            return '<a href="#" class="btn btn-xs btn-primary  edit-role"  did="'.$id->id.'"><i class="fa fa-pencil"></i> Edit</a>'
            ." ".
            '<a href="#" class="btn btn-xs btn-danger  hapus-role" did="'.$id->id.'">Hapus</a>';

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
        //


        if($request->has('aksi'))
        {

            if($request->input('aksi')==0) {

                $id=$request->input('id_role');

                $result=Role::where('id',$id)->update(
                    ['name'=> $request->get('nama'),'description'=> $request->get('keterangan')]);

                if($result){
                    exit (json_encode(array('Sukses', 'Update Data berhasil', 'success')));
                }else{
                    exit(json_encode(array('Ups', 'Update Data tidak berhasil', 'error')));

                }

            }elseif($request->input('aksi')==1) {
                try {
                    
                 $result= Role::create(['name'=> $request->get('nama'),'description'=> $request->get('keterangan')]);

                 if($result){
                    exit(json_encode(array('Sukses', 'Tambah Data <b>'.$request->get('nama').'</b> berhasil ', 'success')));
                }else{
                    exit(json_encode(array('Ups', 'Tambah Data tidak berhasil', 'error')));

                }
            } catch (Exception $e) {
                report($e);

                return false;
            }


        }

    }

    if ($request->has('json_role')){

        $id=$request->get('json_role');

        $edit =Role::where('id', $id)->get();

        return (json_encode($edit));
    }

    if ($request->has('hapus_role')) {

        $id=$request->get('hapus_role');

        $data=Role::where('id',$id)->first();

        $result=Role::where('id',$id)->delete();

        if($result){
            exit(json_encode(array('Sukses', ' Hapus nama  role <b>'.$data->name.'</b> berhasil', 'success')));
        }else{
            exit(json_encode(array('Ups', 'Hapus nama  role <b>'.$data->name.'</b>  tidak berhasil', 'error')));
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
