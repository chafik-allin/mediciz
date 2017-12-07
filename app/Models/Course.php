<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	use \App\Models\FindBySlug;
   	
   	protected $fillable = ['slug', 'title', 'description', 'video', 'hours', 'user_id'];

	public function Qcms()
	{
		return $this->hasMany('App\Models\Qcm');
	}

	public function Training()
	{
		return $this->belongsTo('App\Models\Training');
	}
}
