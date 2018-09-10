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
	$data = Team::orderBy('name')->simplePaginate(10);

	return view('home',compact('data'));
    }
    
    public function search()
    {
	$search = request('searchedname');
	$searched = '%'.$search.'%';

	$data = Team::where('name','like',$searched)->orderBy('name')->get();
//	$data->withPath('search?searchedname='.$search);
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
//	return ['one','four','five',$request->name];

	$this->validation();	

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

//	    dd($this);

//	$data = Team::orderBy('name')->simplePaginate(10);

//	return view('home',compact('data'));
	    //    	return redirect()->route('teamstore');;
		    return back();
//	return "DOne successfully";
	
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
	$this->validation();	
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

    private function validation()
    {
	    $this->validate(request(),[
		    "name" => "required|min:3",
			"sport_id" => 'required',
//			"website" => 'url',
			"established" => 'nullable|numeric'	
		]);

    }

}
