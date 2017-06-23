<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $data = Team::with('sport')->orderBy('name')->simplePaginate(10);
//	dd($data);	    

        return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    Team::create([
		    "name" => $request->name,
		    "sport_id" => $request->sport_id,
		    "club_id" => 6,
		    "website" => $request->website,
		    "slogan" => $request->slogan,
		    "sponsor" => $request->sponsor,
		    "location" => $request->location,
		    "established" => $request->established,
	    ]);

    	return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
	$teamData = Team::with('participant.events.season.tournament')->find($team->id);

	return view('team',compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
	    $team->update([
		    "name" => $request->name,
		    "website" => $request->website,
		    "slogan" => $request->slogan,
		    "sponsor" => $request->sponsor,
		    "location" => $request->location,
		    "established" => $request->established,
	    ]);

    	return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
