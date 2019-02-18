<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;

class Pengguna extends Model
{
    
	use softDeletes;
	
    protected $table="tb_pengguna";

    protected $primerykey="id";


    protected $guarded=[];
   

   public function PenggunaJurusan()
   {
   	
     return $this->belongsTO(Jurusan::class,'id_jurusan','id')->withTrashed();
   }

    public function PenggunaUser()
   {
     return $this->belongsTO(User::class,'id_user','id');
   }


}
