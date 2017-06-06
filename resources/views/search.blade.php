@extends('layouts.index')

@section('topcontent')
	@component('components.home-top') @endcomponent
@endsection



@section('middlecontent')
@if($searchC->get('noResults'))
<div class="notification is-warning content has-text-centered">
  <button class="delete"></button>
<h3>NO SEARCH RESULTS FOR </h3> <h1> <strong> {{ $searchC->get('searched') }} </strong> </h1>
<a href="/" class="button is-primary">Back</a>
</div>
@endif
	@foreach($searchC->get('players') as $player)
		@component('components.search-middle',[
			'name' => $player->name,
			'id' => $player->id,
			'date' => $player->dateOfBirth(),
			'short' => $player->gender,
			'type' => 'player',
			'colour' => 'is-primary'
		]) 
		@endcomponent
	@endforeach
	@foreach($searchC->get('tournaments') as $tour)
		@component('components.search-middle',[
			'name' => $tour->name,
			'id' => $tour->id,
			'short' => $tour->shortname,
			'date' => '2017',
			'type' => 'tournament',
			'colour' => 'is-info'
		]) 
		@endcomponent
	@endforeach
	@foreach($searchC->get('teams') as $team)
		@component('components.search-middle',[
			'name' => $team->name,
			'id' => $team->id,
			'date' => '',
			'short' => '',
			'type' => 'team', 
			'colour' => 'is-warning'
		]) 
		@endcomponent
	@endforeach
	@foreach($searchC->get('clubs') as $club)
		@component('components.search-middle',[
			'name' => $club->name,
			'id' => $club->id,
			'date' => '',
			'short' => '',
			'type' => 'club',
			'colour' => 'is-danger'
		]) 
		@endcomponent
	@endforeach
@endsection


@section('bottomcontent')
	@component('components.home-bottom') @endcomponent
@endsection
