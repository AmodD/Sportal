<?php

$factory->define(App\Match::class, function (Faker\Generator $faker) {

$indian = Faker\Factory::create('en_IN');

//$tennis = new App\Repositories\Tennis;
//$eventId = $tennis->getEventId();

return [
	'name' => 'test',
	'round_id' => '1',
	'date' => '2017'
];

});
