<div id = "app">

@foreach($player->teamSports() as $sport => $teams )

	<psd sportname={{ $sport }} 
	     :teams="{{ $teams->toJson() }}"
	     :seasons="{{ $player->seasonsBySports()->get($sport) }}">
	</psd>

	
	@foreach($teams as $team)
		@foreach($team->playerEvents() as $event)
		<strong>{{ $event->participantExitRound($team->participant) }}</strong>
			@component('components.events_list',[
			'event' => $event
			]) @endcomponent
		@endforeach
	@endforeach
	<br>

@endforeach
</div>
