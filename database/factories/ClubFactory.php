<?php

$factory->define(App\Club::class, function (Faker\Generator $faker) {

static $clubPrefix = array('Club', 'Club of', 'Federation of', 'Association of', 'Sports', 'North', 'The');

static $clubSuffix = array('Club', 'Association', 'Western Sports Club', 'South Club', 'Sports', 'Federation', 'Group');

$p = $clubPrefix[array_rand($clubPrefix)];
$s = $clubSuffix[array_rand($clubSuffix)];
$indian = Faker\Factory::create('en_IN');

return [
	//'name' => $indian->city 
        'name' => $p." ".$indian->city." ".$s
    ];
});
