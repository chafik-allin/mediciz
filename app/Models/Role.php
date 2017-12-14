<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

 	public function users()
    {
        return $this->belongsToMany('App\User', 'user_role');
    }

    public static function superAdmins()
    {
    	if($superAdminRole = Role::where('name', 'superadmin')->first())
	    	return 	$superAdminRole->belongsToMany('App\User', 'user_role')->get();
    	
    }
}
