<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use \App\Models\FindBySlug;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

   public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_role');
    }


    public function is($isRole)
    {
        foreach($this->roles as $role)
            if(strtolower($role->name) == strtolower($isRole))
                return true;
        
        return false;
    }

    public function Company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function owner($company)
    {
        //Si super admin alors autoriser..
        if($this->is('superadmin'))
            return true;

        if(strtolower($this->Company->slug) == strtolower($company))
            return true;
        return false;
    }
    
    public function Trainings()
    {
        $this->belongsToMany('App\Models\Training', 'training_user');
    }

    public function courses()
    {
        $this->belongsToMany('App\Models\Course', 'user_course');
    }

    public function AQcms()
    {
        $this->belongsToMany('App\Models\Answer', 'user_answer');
    }

    public function Certificates()
    {
        $this->belongsToMany('App\Models\Certificate', 'user_certificate');
    }
    //mutator slug

    public function setSlugAttribute($value)
    {
        $users = User::where('slug','like',$value.'%')->get();
        if($users->count()>0)
            $this->attributes['slug'] =  $value."-".$users->count();
        else
            $this->attributes['slug'] = $value;
    }
}
