@extends('layouts.index')

@section('topcontent')
	@component('components.home-top') @endcomponent
@endsection

@section('middlecontent')
	@component('components.home-middle1') @endcomponent
	@component('components.home-middle2') @endcomponent
@endsection


@section('bottomcontent')
	@component('components.home-bottom') @endcomponent
@endsection
