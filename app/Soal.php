<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
  protected $table="tb_soal";

  protected $primerykey="id";

  protected $guarded=[];
  

  public function SoalEssai()
  {
    
   return $this->hasMany(Essai::class,'id','id_soal');
 }

 public function SoalGrubSoal()
 {
  return $this->hasMany(GrubSoal::class,'id','id_soal');
}

public function SoalJawabKuis()
{
  return $this->hasMany(JawabKuis::class,'id','id_soal');
}



}
