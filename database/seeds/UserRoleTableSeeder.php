<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Models\Role;

class UserRoleTableSeeder extends Seeder
{
    public function run()
    {
	/*ROLES*/
    	
    	//delete method is a custom method to ask if you want to delete specific $table
		parent::delete('roles');
	

    	$roles 	=	['superadmin', 'admin'];
        foreach($roles as $role)
        {
        	Role::firstOrCreate(
    		[
    			"name" => $role
    		]);
    //		echo "\tRole '$role' created\n";
        }
        echo "====================\n";
        $superAdminId = Role::where('name', 'superadmin')->first();

  	/*END ROLES*/

  	/*Users*/
		parent::delete('users');

    	
        if(User::count()>0)
            return;

    	$users = ['chafik', 'nabil', 'ali'];
	    foreach($users as $user)
        {
        	$user = User::firstOrCreate(
    		[
    			"name" 		=> 	$user,
                "slug"      =>  str_slug($user),
    			"email"		=> 	"$user@is-allin.com",
    			"password"	=>	bcrypt($user),
                'remember_token' => str_random(10),
    		]);
    		//Attach superadmin role to user
    		if($user->roles == null)
                $user->roles()->save($superAdminId);
        }
	/*END USERS*/
    
    }
}
