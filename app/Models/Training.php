<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{

	public function Companies()
	{
		$this->belongsToMany('App\Models\Company', 'training_company');
	}

	public function Users()
	{
		$this->belongsToMany('App\User', 'training_user');
	}

	public function Courses()
	{
		$this->hasMany('App\Models\Course', 'training_course');
	}
}
