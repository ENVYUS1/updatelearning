<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;

class Essai extends Model
{
    protected $table="tb_essai";

    protected $primerykey="id";

    protected $guarded=[];
   

   public function EssaiSoal()
   {
   	
     return $this->belongsTO(Soal::class,'id_soal','id')->withTrashed();
   }


    public function EssaiJawabEssai()
     {
          return $this->hasMany(Essai::class,'id','id_essai');
     }

}
