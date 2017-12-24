<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	use FindBySlug;

    protected $fillable = ['name', "slug" , "description",'image',"founder","contact", "adress","phone"];

	public function admin()
	{
		return $this->hasOne('App\User');
	}

    public function getAllTrainings()
    {
        return $this->belongsToMany('App\Models\Training', 'training_company')->withPivot('is_confirmed');
    }

    public function getConfirmedTrainings()
    {
        return $this->belongsToMany('App\Models\Training', 'training_company')->where('is_confirmed',1);
    }

    public function getOnHoldTrainings()
    {
        return $this->belongsToMany('App\Models\Training', 'training_company')->where('is_confirmed',0);        
    }

    public function getTrainingStatusById($id)
    {
        $training = $this->belongsToMany('App\Models\Training', 'training_company')->withPivot('is_confirmed')->where('training_id', $id)->first();
        if($training != null)
            return $training->pivot->is_confirmed;
    
        return NULL;
    }

    public function usersWithCertificate(\App\Models\Training $training)
    {
        
    }
    public function Users()
    {   
        return $this->hasMany('App\User');
    }

    public function hasTraining($id)
    {
        return $this->getConfirmedTrainings()->where('training_id', $id)->first();
    }
  
}
