<?php

$factory->define(App\Player::class, function (Faker\Generator $faker) {

$indian = Faker\Factory::create('en_IN');

$sex = 0;
if(rand(0,1)) $sex = 1;

$name = '';
if($sex) $name = $indian->name($gender='male') ; else $name = $indian->name($gender='female') ;

return [
	//'name' => $indian->city 
	'name' => $name,
	'dob' => $faker->date,
	'gender' => $sex,
	'quote' => $faker->realText($maxNbChars = 100, $indexSize = 1)
    ];
});
