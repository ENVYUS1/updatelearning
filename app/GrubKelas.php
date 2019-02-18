<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;


class GrubKelas extends Model
{
    use softDeletes;

    protected $table="tb_grub_kelas";

    protected $primerykey="id";

    protected $guarded=[];
   

   public function GrubKelasUser()
   {
   	
     return $this->belongsTO(User::class,'id_user','id');
   }

     public function GrubKelasKelas()
   {
   	
     return $this->belongsTO(Kelas::class,'id_kelas','id')->withTrashed();
   }
}
