<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;

class Jurusan extends Model
{
    
	use softDeletes;
	
    protected $table="tb_jurusan";

    protected $primerykey="id";

    protected $guarded=[];
   

   public function JurusanPengguna()
   {
   	
     return $this->hasMany(Pengguna::class,'id','id_jurusan');
   }

}
