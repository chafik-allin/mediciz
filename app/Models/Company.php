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
        return $this->belongsToMany('App\Models\Training', 'training_company');
    }

    public function UsersWithCertificate(\App\Models\Training $training)
    {
        
    }
    public function Users()
    {
        return $this->hasMany('App\User');
    }

  
}
