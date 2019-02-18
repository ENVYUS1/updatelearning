<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;

class Kelas extends Model
{

    use softDeletes;

    protected $table="tb_kelas";

    protected $primerykey="id";

    protected $guarded=[];
   

   public function KelasSoal()
   {
   	
     return $this->belongsTO(Soal::class,'id_soal','id')->withTrashed();
   }

    public function KelasMatkul()
   {
    
     return $this->belongsTO(Matkul::class,'id_matkul','id')->withTrashed();
   }

    public function KelasUser()
   {
    
     return $this->belongsTO(User::class,'id_user','id');
   }


   public function KelasForum ()
   {
   	return $this->hasMany(Forum::class,'id','id_kelas');
   }

    public function KelasGrubKelas ()
   {
   	return $this->hasMany(GrubKelas::class,'id','id_kelas');
   }

     public function KelasGrubSoal ()
   {
   	return $this->hasMany(GrubSoal::class,'id','id_kelas');
   }

      public function KelasMateri ()
   {
   	return $this->hasMany(Materi::class,'id','id_kelas');
   }

}
