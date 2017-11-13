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
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
        if(strtolower($this->Company->slug) == strtolower($company))
            return true;
        return false;
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
