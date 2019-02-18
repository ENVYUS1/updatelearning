<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;

class JawabGanda extends Model
{
    use softDeletes;

    protected $table="tb_jawab_ganda";

    protected $primerykey="id";

    protected $guarded=[];
   

   public function JawabGandaPilihanGanda()
   {
   	
     return $this->belongsTO(PilihanGanda::class,'id_pilihan_ganda','id')->withTrashed();
   }

     public function JawabGandaUser()
   {
   	
     return $this->belongsTO(User::class,'id_user','id')->withTrashed();
   }
}
