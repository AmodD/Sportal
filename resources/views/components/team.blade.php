<div class="columns">
	<div class="column">
	@component('components.team-box',[
		'team' => $team
	]) @endcomponent
	</div>
</div>
<div class="columns">
@php
$teamEvents = $team->teamEvents();
if(!empty($teamEvents))
{
$latestEvent = $teamEvents->last();
@endphp
	<div class="column is-one-third">
	@component('components.team-members',[
		'players' => $team->teamEventPlayers($latestEvent)
	]) @endcomponent
	</div>
	<div class="column">
	@foreach($teamEvents as $event)
		<strong>{{ $event->participantExitRound($team->participant) }}</strong>
		@component('components.events_list',[
		'event' => $event
		]) @endcomponent
<br>
	@endforeach
	</div>
@php
}
@endphp
</div>
