<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

	public function Qcms()
	{
		$this->hasMany('App\Models\Qcm');
	}

	public function Training()
	{
		$this->belongsToMany('App\Models\Training', 'training_course');
	}
}
