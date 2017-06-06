<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	public function event()
	{
		return $this->belongsTo(Event::class);
	}

	public function round()
	{
		return $this->belongsTo(Round::class);
	}

	public function matchups()
	{
		return $this->hasMany(Matchup::class);
	}
}
