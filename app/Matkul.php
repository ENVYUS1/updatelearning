<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;

class Matkul extends Model
{

	use softDeletes;

	protected $table="tb_matkul";

	protected $primerykey="id";

	protected $guarded=[];


	public function MatkulKelas()
	{
		return $this->hasMany(Kelas::class,'id','id_matkul');
	}

}
