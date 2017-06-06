<?php

$factory->define(App\Score::class, function (Faker\Generator $faker) {

$indian = Faker\Factory::create('en_IN');

return [
//	'name' => $gender." ".$formatA["name"]." ".$levelA["name"],
	//"text" => $faker->sentence,
	"player_id" => "",
	"part" => 1,
	"score" => 6,
	"unit_id" => ""

    ];
});
