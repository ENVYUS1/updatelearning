<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabKuis extends Model
{
	protected $table="tb_jawab_kuis";

	protected $primerykey="id";

	protected $guarded=[];

  public function JawabKuisSoal()
  {

   return $this->belongsTO(Soal::class,'id_soal','id')->withTrashed();
 }

 public function JawabKuisUser()
 {

   return $this->belongsTO(User::class,'id_user','id');
 }

 public function JawabKuisNilai()
 {
  return $this->hasMany(Nilai::class,'id','id_jawab_kuis');
}
}
