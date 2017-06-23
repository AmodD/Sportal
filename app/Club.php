<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
	//
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
    ];

	public function teams()
	{
		return $this->hasMany(Team::class);
	}


	public static function search($data)
	{
		return static::where('name','like',$data)->get();
	}
}
