<?php

$factory->define(App\Tournament::class, function (Faker\Generator $faker) {


static $tournamentSuffix = array('Tour', 'Tournament', 'Championship', 'Competition', 'Cup', 'Trophy', 'Memorial');

$s = $tournamentSuffix[array_rand($tournamentSuffix)];
$indian = Faker\Factory::create('en_IN');

$sports = new App\Sport;
$sportsA = $sports->all()->toArray();
$sportsAId = array_rand($sportsA);
$sportA  = $sportsA[$sportsAId];

return [
	'sport_id' => $sportA["id"], 
	'name' => $faker->state." ".$sportA["name"]." ".$s,
	//"text" => $faker->sentence,
	"shortname" => $faker->stateAbbr." ".$s

    ];
});
