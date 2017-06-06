@extends('layouts.index')

@section('topcontent')
	@component('components.home-top') @endcomponent
@endsection

@section('middlecontent')
	@component('components.season-middle',[
	'tournament' => $tournament,
	'seasonid' => $season->id,
	'name' => $season->name,
	'year' => $season->year,
	'start' => $season->start,
	'end' => $season->end,
	'events' => $events
	]) @endcomponent
@endsection


@section('bottomcontent')
	@component('components.home-bottom') @endcomponent
@endsection
