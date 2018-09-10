<?php

namespace App\Http\Controllers;

use App\Tournament;
use App\Season;
use App\Event;
use App\Match;
use App\Matchup;
use App\Repositories\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $events = Event::all();		 
	    $tournaments = Tournament::all();
	    $seasons = Season::all();
	    $data = collect([]);
	    $data->put('events',$events);
	    $data->put('tournaments',$tournaments);
	    $data->put('seasons',$seasons);
//dd($data);
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
//	    dd($request);
	    $event = new Event();

	    $event->name = $request->event_name;
	    $event->season_id = ($request->season_id);
	    $event->format_id = ($request->format);
	    $event->level_id = ($request->level);
	    $event->gender = ($request->gender);
	    $event->type = ($request->type);
	    $event->totalparticipants = (8);
	    $event->winpts = (3);
	    $event->status = (0);

	    $event->save();

	    return redirect("/tournaments");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament, Season $season , Event $event )
    {
	    $events = new \App\Repositories\Events;
	    $data = $events->getData($event);
	    $data->put('tournament',$tournament);
	    $data->put('season',$season);
//dd($data);
        return view('event',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
	    //    dd($event);
	  $data = $event;
        return view('home',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
