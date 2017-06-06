@extends('layouts.index')

@section('topcontent')
	@component('components.home-top') @endcomponent
@endsection

@section('middlecontent')
	@component('components.event',[
	'tournament' => $data->get('tournament'),
	'season' => $data->get('season'),
	'event' => $data->get('event'),
	'matches' => $data->get('event')->matches,
	'participants' => $data->get('event')->participants,
	'table' => $data->get('table'),
	'matchdays' => $data->get('matchdays')
	]) @endcomponent
@endsection


@section('bottomcontent')
	@component('components.home-bottom') @endcomponent
@endsection
