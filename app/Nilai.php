<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table='tb_nilai';

    protected $guarded=[];

     public function NilaiJawabKuis()
     {
     	return $this->belongsTo(Soal::class,'id_jawab_kuis','id');
     }
}
