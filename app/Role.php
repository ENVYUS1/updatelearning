<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;

class Role extends Model
{

	use softDeletes;
	
     protected $fillable = array('name','description');
}
