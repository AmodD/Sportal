<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matchup extends Model
{
	public function match()
	{
		return $this->belongsTo(Match::class);
	}

	public function participant()
	{
		return $this->belongsTo(Participant::class);
	}

	public function scores()
	{
		return $this->hasMany(Score::class);
	}


}
