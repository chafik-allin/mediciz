<?php
/*

$faker->randomDigit;
$faker->numberBetween(1,100);
$faker->word;
$faker->paragraph;
$faker->lastName;
$faker->city;
$faker->year;
$faker->domainName;
$faker->creditCardNumber;


*/
use Faker\Generator as Faker;

$factory->define(App\Models\Company::class, function (Faker $faker) 
{
    return 
    [
		'name'			=>	$n = $faker->name,
		"slug"			=> str_slug($n),
		"description"	=>	$faker->paragraph,
		'image'			=>	"http://www.freeiconspng.com/uploads/company-factory-icon--icon-search-engine--iconfinder-6.png",
		"founder"		=>	$faker->name,
		"contact"		=>	$faker->unique()->safeEmail,
    	"adress"		=>	$faker->city,
    	"phone"			=>	'0'.str_random(9)
    ];
});
