<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
	//

	public function tournaments()
	{
		return $this->hasMany(Tournament::class);
	}

	public function teams()
	{
		return $this->hasMany(Team::class);
	}

	public function formats()
	{
		return $this->hasMany(Format::class);
	}
	
}
