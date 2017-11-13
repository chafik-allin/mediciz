<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Créer des utilisateurs + roles + assigner superadmin a ses users
    	$this->call(UserRoleTableSeeder::class);
        $this->call(CompaniesSeeder::class);

    }

    
}
