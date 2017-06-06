<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    
	public function scores()
	{
		return $this->hasMany(Score::class);
	}

}
