
@foreach($player->eventsBySport() as $sport => $events)
	<span class="tag is-large  is-info"><strong>{{ $sport }}</strong>&nbsp;</span> 
	&nbsp;&nbsp;&nbsp;&nbsp;
	<span>
	<em><small>matches </small></em> &nbsp;{{ $player->matchesPlayed($sport) }}  
	&nbsp;&nbsp;<em> <small>won </small></em> &nbsp;{{ $player->matchesWon($sport) }} 
	&nbsp;&nbsp;<em><small>titles </em></small> &nbsp;{{ $player->titles($sport)  }}
	</span>
	<br><br>
	@foreach($events as $event )
		<strong>{{ $event->participantExitRound($player->participant) }}</strong>
		@component('components.events_list',[
		'event' => $event
		]) @endcomponent
	@endforeach
@endforeach


