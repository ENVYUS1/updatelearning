<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;

class Materi extends Model
{

	use softDeletes;
	
    protected $table="tb_materi";

    protected $primerykey="id";

    protected $guarded=[];
   

   public function MateriKelas()
   {
   	
     return $this->belongsTO(Kelas::class,'id_kelas','id')->withTrashed();
   }
    
}
