<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use \App\Models\FindBySlug;
   
	protected $fillable = ['slug', 'title', 'description', 'cover', 'difficulty', 'hours','user_id', 'category_id'];


	public function Tags()
	{
		return $this->morphMany('App\Models\Tag', 'taggable');
	}

	public function Category(){
		return $this->belongsTo('App\Models\Category');
	}
	public function Companies()
	{
		return $this->belongsToMany('App\Models\Company', 'training_company');
	}

	public function Users()
	{
		return $this->belongsToMany('App\User', 'training_user');
	}

	public function courses()
	{
		return $this->hasMany('App\Models\Course');
	}

	public function certificate()
	{
		return $this->hasMany('App\Models\Certificate');
	}
}
