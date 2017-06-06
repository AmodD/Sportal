@extends('layouts.index')

@section('topcontent')
	@component('components.home-top') @endcomponent
@endsection

@section('middlecontent')
	@component('components.tournament-middle',[
	'name' => $tournament->name,
	'tourid' => $tournament->id,
	'shortname' => $tournament->shortname,
	'seasons' => $seasons
	]) @endcomponent
@endsection


@section('bottomcontent')
	@component('components.home-bottom') @endcomponent
@endsection
