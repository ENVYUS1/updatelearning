<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PilihanGanda extends Model
{
    use softDeletes;
	
    protected $table="tb_Pilihan_ganda";

    protected $primerykey="id";

    protected $guarded=[];
   

   public function PilihanGandaJawabGanda()
   {
   	
     return $this->belongsTO(Kelas::class,'id','id_pilihan_ganda')->withTrashed();
   }

}
