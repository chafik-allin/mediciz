<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Models\Role;

use App\Models\Company;

class UserRoleTableSeeder extends Seeder
{
    public function run()
    {
        echo "This action will refresh USERS, ROLES, USER_ROLE, COMPANIES Tables\n";
        $response = readline("Continue (yes|no) ? [no] : ");
        $response = preg_replace("/\s/","", $response);
        if($response == "yes")
        {
            DB::table('roles')->delete();
            DB::table('user_role')->delete();
            DB::table('users')->delete();
            DB::table('companies')->delete();
        }
        else
            return;

   /*ROLES*/
    	
    	//delete method is a custom method to ask if you want to delete specific $table
		

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
        $adminId = Role::where('name', 'admin')->first();

    /*END ROLES*/

  	/*Users*/

    	
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
            $user->roles()->save($superAdminId);
        }
	/*END USERS*/
    
    /* COMPANY */ 
        $company = Company::firstOrCreate(
            [
                "slug"          => str_slug('Company Test'),
                'name'          => 'Company Test',
                "description"   =>  "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur",
                'image'         =>  "http://www.freeiconspng.com/uploads/company-factory-icon--icon-search-engine--iconfinder-6.png",
                "founder"       =>  "Company Founder",
                "contact"       =>  "contact@company.com",
                "adress"        =>  "Company adress Lorem ipsum dolor sit amet.",
                "phone"         =>  '0021351452369'
            ]);
        //Créer un admin pour la company
        $user = User::firstOrCreate(
            [
                'name'      =>  'Company Owner',
                'slug'      =>  str_slug('Company Owner'),
                'email'     =>  'owner@company.com',
                'password'  =>  bcrypt('owner'),
                'company_id'=>  $company->id
            ]
        );
        $user->roles()->save($adminId); 


    /* END COMPANY */


    }
}
