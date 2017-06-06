<?php

$factory->define(App\Season::class, function (Faker\Generator $faker) {


static $seasonString = array('1st', '2nd', '3rd', '4th', '51st', '60th', '10');

$s = $seasonString[array_rand($seasonString)];
$indian = Faker\Factory::create('en_IN');

$tournaments = new App\Tournament;
$tourCount = $tournaments->all()->count();

$seasonNo = rand(1995,2017);
$name = "";
if(rand(0,1)) { $name = $seasonNo ; }  else { $name = $s ; }

return [
	'tournament_id' => rand(1,$tourCount), 
	'name' => $name,
	//"text" => $faker->sentence,
	"year" => $seasonNo,
	"start" => $faker->date,
	"end" => $faker->date

    ];
});
