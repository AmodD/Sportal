<?php

$factory->define(App\Participant::class, function (Faker\Generator $faker) {

$indian = Faker\Factory::create('en_IN');

$pid = 0;
$ptype = "";

if(rand(0,7))
{
	$pid = factory(App\Player::class)->create()->id;
        $ptype = 'App\Player';	
}
else
{
	$pid = factory(App\Team::class)->create()->id;
        $ptype = 'App\Team';	

}

return [
	//'name' => $indian->city 
	'participantable_id' => $pid,
	'participantable_type' => $ptype
    ];
});
