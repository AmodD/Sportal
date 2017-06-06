
@foreach($player->teamSports() as $sport => $teams )
<span class="tag is-info is-large">{{ $sport }}</span><br>
	@foreach($teams as $team)
		<br><span class="tag is-success is-medium"><a href="/teams/{{ $team->id }}">{{ $team->name }}</a></span>

	&nbsp;&nbsp;&nbsp;&nbsp;
		<small><em> matches  </em></small> {{ $team->matchesPlayed() }}
		&nbsp;&nbsp;<small><em> won</em></small> {{ $team->matchesWon() }} 
		&nbsp;&nbsp;<small><em> titles </em> </small> {{ $team->titles()  }}
		<br><br>
		@foreach($team->playerEvents() as $event)
		<strong>{{ $event->participantExitRound($team->participant) }}</strong> <span class="icon"><i class="fa fa-star"></i></span>
			@component('components.events_list',[
			'event' => $event
			]) @endcomponent
		@endforeach
	@endforeach
@endforeach
