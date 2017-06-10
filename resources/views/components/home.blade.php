@php 
$routeName =  Route::currentRouteName() ;
@endphp

@if($routeName == 'erd')
	@component('components.erd') @endcomponent
@endif
@if($routeName == 'journey')
	@component('components.journey') @endcomponent
@endif
@if($routeName == 'terminology')
	@component('components.terminology') @endcomponent
@endif
@if($routeName == 'faqs')
	@component('components.faqs') @endcomponent
@endif
@if($routeName == 'dashboard' || $routeName == 'home' || $routeName == '')
	@component('components.dashboard') @endcomponent
@endif
@if($routeName == 'main')
	@component('components.home-middle2') @endcomponent
@endif
