<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;

class GrubSoal extends Model
{
    use softDeletes;
	
    protected $table="tb_grub_soal";

    protected $primerykey="id";

    protected $guarded=[];
   

   public function GrubSoalKelas()
   {
   	
     return $this->belongsTO(Kelas::class,'id_kelas','id')->withTrashed();
   }

     public function GrubSoalSoal()
   {
   	
     return $this->belongsTO(Soal::class,'id_soal','id')->withTrashed();
   }
}
