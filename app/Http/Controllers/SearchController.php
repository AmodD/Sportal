<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Tournament;
use App\Team;
use App\Club;

class SearchController extends Controller
{
	public function show()
	{
		$searched = '%'.request('search').'%';
//	dd($searched);
		$players = Player::search($searched);
		$tournaments = Tournament::search($searched);
		$teams = Team::search($searched);
		$clubs = Club::search($searched);

		$searchC = collect([]);
		$searchC->put('players',$players);
		$searchC->put('tournaments',$tournaments);
		$searchC->put('teams',$teams);
		$searchC->put('clubs',$clubs);

		$resultsFlag = $searchC->every( function ($value,$key) {  return $value->isEmpty() ;});
		$searchC->put('noResults',$resultsFlag);

		$searchC->put('searched',request('search'));

//	dd($searchC);	
		return view('search',compact('searchC'));
	}
    
}
