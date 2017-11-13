<?php

use Illuminate\Database\Seeder;
use App\Models\Company;
use Faker\Generator as Faker;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		parent::delete('companies');
		factory('App\Models\Company',50)->create();
	}

}
