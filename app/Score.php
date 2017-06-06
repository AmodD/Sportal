<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
	public function matchup()
	{
		return $this->belongsTo(Matchup::class);
	}

	public function player()
	{
		return $this->belongsTo(Player::class);
	}


	public function unit()
	{
		return $this->belongsTo(Unit::class);
	}

}
