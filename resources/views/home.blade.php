@extends('layouts.index')

@section('topcontent')
	@component('components.home-top') @endcomponent
@endsection

@section('middlecontent')
	<div class="columns">
	@if(Auth::check()) 
		<div class="column is-one-quarter">
		@component('components.menu') @endcomponent
		</div>
		<div class="column">
		@component('components.home') @endcomponent
		</div>
	@else
	<div class="column">
	@component('components.home-middle1') @endcomponent
	@component('components.home-middle2') @endcomponent
	</div>
	@endif
	</div>
@endsection


@section('bottomcontent')
	@component('components.home-bottom') @endcomponent
@endsection
