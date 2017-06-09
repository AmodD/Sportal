@extends('layouts.index')

@section('topcontent')
	@component('components.home-top') @endcomponent
@endsection

@section('middlecontent')
	@component('components.login') @endcomponent
@endsection


@section('bottomcontent')
	@component('components.home-bottom') @endcomponent
@endsection
