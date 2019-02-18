<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;


class Forum extends Model
{

	use softDeletes;

    protected $table="tb_forum";

    protected $primerykey="id";

    protected $guarded=[];
   

   public function ForumKelas()
   {
   	
     return $this->belongsTO(Kelas::class,'id_kelas','id')->withTrashed();
   }

     public function ForumUser()
   {
   	
     return $this->belongsTO(User::class,'id_user','id')->withTrashed();
   }

}
