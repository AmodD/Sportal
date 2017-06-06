<?php

namespace App\Repositories;

use App\Player;

class Players
{
	public function getData(Player $player)
	{
		$data = collect([]);
		$player = Player::find($player->id);  

		$data->put("player",$player);
		$data->put("personalPerformance",$player->eventsBySport());
		$data->put("groupPerformance",$player->teamSports());

		return $data;

	}
}
