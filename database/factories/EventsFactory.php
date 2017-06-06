<?php

$factory->define(App\Event::class, function (Faker\Generator $faker) {

$indian = Faker\Factory::create('en_IN');

$seasons = new App\Season;
$seasonCount = $seasons->all()->count();
$seasonId = rand(1,$seasonCount); 

//$sportName = $seasons::with('tournament.sport')->find($seasonId)->tournament->sport->name;
$sportId = $seasons::with('tournament.sport')->find($seasonId)->tournament->sport->id;
$sportName = $seasons::with('tournament.sport')->find($seasonId)->tournament->sport->name;

$formats = new App\Format;
//$formatsA = $formats::search($sportName)->toArray();
$formatsA = $formats->where('sport_id',$sportId)->get()->toArray();
$formatsAId = array_rand($formatsA);
$formatA = $formatsA[$formatsAId];

$levels = new App\Level;
$levelsA = $levels->all()->toArray();
$levelsAId = array_rand($levelsA);
$levelA = $levelsA[$levelsAId];

$genderNo = rand(0,1);
$gender = "";
if($genderNo) { $gender = 'Mens' ; }  else { $gender = "Womens" ; }

$typeC = collect(['KO','L','GAKO','S','F']);
$type = 'KO';
$totalParticipants = 8;
$winpts = 3;
if($sportName == "Cricket") 
{
	$type = $typeC->random();
	if($type == 'S' || $type == 'F' ) $totalParticipants = 2;
}
if($sportName == "Athletics")
{
	$type="";
	$totalParticipants = 0;
}
if($sportName == "Hockey")
{
    $type = 'L';
    $totalParticipants = 6;	    
}


return [
	'season_id' => $seasonId, 
	'name' => $gender." ".$formatA["name"]." ".$levelA["name"],
	//"text" => $faker->sentence,
	"format_id" => $formatA["id"],
	"level_id" => $levelA["id"],
	"gender" => $genderNo,
	"totalparticipants" => $totalParticipants,
	"type" => $type,
	"winpts" => $winpts,
	"status" => 2
    ];
});
