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
    protected $fillable = ['name', 'email','slug', 'password'];

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
    public function isAdmin(){
        return $this->is('admin');
    }
    public function isSuperAdmin(){
        return $this->is('superadmin');
    }

    public function isStudent()
    {
        if($this->is('admin') || $this->is('superadmin'))
            return false;
        return true;
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
    
    public function publishedTrainings()
    {
        return $this->hasMany('App\Models\Training');
    }
    public function Trainings()
    {
       return $this->belongsToMany('App\Models\Training', 'training_user');
    }

    public function Notifications(){
        return $this->belongsToMany('App\Models\Notification', 'user_notification')->where('is_viewed',false);
    }

    public function courses()
    {
       return $this->belongsToMany('App\Models\Course', 'user_course');
    }

    public function publishedCourses()
    {
        return $this->hasMany('App\Models\Course');
    }

    public function AQcms()
    {
       return $this->belongsToMany('App\Models\Answer', 'user_answer');
    }

    public function Certificates()
    {
      return  $this->belongsToMany('App\Models\Certificate', 'user_certificate');
    }
    //mutator slug

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

    
}
