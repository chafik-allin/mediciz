<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

	protected $fillable = ['name', "slug" , "description",'image',"founder","contact", "adress","phone"];

	use FindBySlug;

	public function admin()
	{
		return $this->hasOne('App\User');
	}

    public function Trainings()
    {
        $this->belongsToMany('App\Models\Training', 'training_company');
    }

    public function Users()
    {
        $this->hasMany('App\User');
    }

  	public function setSlugAttribute($value)
    {
        $companies = Company::where('slug','like',$value.'%')->get();
        if($companies->count()>0)
            $this->attributes['slug'] =  $value."-".$companies->count();
        else
            $this->attributes['slug'] = $value;
    }
}
