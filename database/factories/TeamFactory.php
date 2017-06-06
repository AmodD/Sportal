<?php

$factory->define(App\Team::class, function (Faker\Generator $faker) {

$indian = Faker\Factory::create('en_IN');

static $teamSuffix = array('Team','XI','Sevens','Warriors','United','Kings','Sporting','Giants','City','Royals','Falcons','Indians','Reds','Hawks','Pacers');

$t = $teamSuffix[array_rand($teamSuffix)];
$sports = new App\Sport;
$clubs = new App\Club;

$sportCount = $sports->all()->count();
$clubCount = $clubs->all()->count();

return [
	//'name' => $indian->city 
	'name' => $indian->localityName." ".$t,
	'club_id' => rand(1,$clubCount),
	'sport_id' => rand(1,$sportCount),
//	'sport_id' => 2,
	'website' => $faker->domainName,
	'slogan' => $faker->catchPhrase,
	'sponsor' => $faker->company,
	'location' => $faker->address,
	'established' => $faker->year($max = 'now')

    ];
});
