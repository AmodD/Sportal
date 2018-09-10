@php 
$routeName =  Route::currentRouteName() ;
$componentName = 'components.'.$routeName ;
@endphp

@if($routeName == 'dashboard' || $routeName == 'home' || $routeName == '')
	@component('components.dashboard') @endcomponent
@elseif($routeName == 'main')
	@component('components.home-middle2') @endcomponent
@elseif($routeName == 'teamsearch' || $routeName == 'teamstore')
	@component('components.teams',['data' => $data]) @endcomponent
@else
	@component($componentName,['data' => $data]) @endcomponent
@endif
