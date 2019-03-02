<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;

class Soal extends Model
{

	use softDeletes;

	protected $table="tb_soal";

	protected $primerykey="id";

	protected $guarded=[];

	public function SoalEssai()
	{

		return $this->hasMany(Essai::class,'id','id_soal');
	}

	public function SoalGrubSoal()
	{
		return $this->belongsTO(GrubSoal::class,'id_grub_soal','id')->withTrashed();
	}

	public function SoalJawabKuis()
	{
		return $this->hasMany(JawabKuis::class,'id','id_soal');
	}

}
