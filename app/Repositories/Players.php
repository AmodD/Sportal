<?php

namespace App\Repositories;

use App\Player;
use App\Season;

class Players
{
	public function getData(Player $player)
	{
		$data = collect([]);
		$player = Player::find($player->id);  

		$data->put("player",$player);
//		$data->put("personalPerformance",$player->eventsBySport());
//		$data->put("groupPerformance",$player->teamSports());

		$data->put("playingYears",$this->getPlayingYears($player));

		return $data;

	}

	private function getPlayingYears($player)
	{
		$yearsInSport = collect([]);
		$seasons = Season::all();

	//	dd($seasons);
		foreach($player->teamSports() as $sport => $teams )
		{
			//			$yearsInSport[$sport] = $teams->pluck('pivot.event_id');
//dd($teams);
		//				$yearsInSport[$sport] = $seasons->where('event_id',$teams->pluck('pivot.event_id'));
		}
		
		return $yearsInSport ;
	}
}
