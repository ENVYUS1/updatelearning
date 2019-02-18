<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;

class JawabEssai extends Model
{
     use softDeletes;

    protected $table="tb_jawab_essai";

    protected $primerykey="id";

    protected $guarded=[];
   

   public function JawabEssaiEssai()
   {
   	
     return $this->belongsTO(Essai::class,'id_essai','id')->withTrashed();
   }

     public function JawabEssaiUser()
   {
   	
     return $this->belongsTO(User::class,'id_user','id')->withTrashed();
   }
}
