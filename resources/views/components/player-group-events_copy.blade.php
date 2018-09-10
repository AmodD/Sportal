<div id = "app">
@foreach($player->teamSports() as $sport => $teams )
    <psd sportname={{ $sport }}></psd>
@endforeach
</div>

<div class="tabs is-toggle">
  <ul>
@foreach($player->teamSports() as $sport => $teams )
  <p class="control">
    <a class="button" id="{{ $sport }}displayText" href="javascript:toggle('{{ $sport }}');">
      <span class="icon is-small">
        <i class="fa fa-align-right"></i>
      </span>
      <span>{{ $sport }}</span>
    </a>
  </p>


<!--
<span class="tag is-info is-large"><a id="{{ $sport }}displayText" href="javascript:toggle('{{ $sport }}');">{{ $sport }}</a></span><br><br>
-->
<div id="{{ $sport }}toggleText" style="display: none">
	@foreach($teams as $team)
		<br><span class="tag is-success is-medium"><a href="/teams/{{ $team->id }}">{{ $team->name }}</a></span>

	&nbsp;&nbsp;&nbsp;&nbsp;
		<small><em> matches  </em></small> {{ $team->matchesPlayed() }}
		&nbsp;&nbsp;<small><em> won</em></small> {{ $team->matchesWon() }} 
		&nbsp;&nbsp;<small><em> titles </em> </small> {{ $team->titles()  }}
		<br><br>
		@foreach($team->playerEvents() as $event)
		<strong>{{ $event->participantExitRound($team->participant) }}</strong>
			@component('components.events_list',[
			'event' => $event
			]) @endcomponent
		@endforeach
	@endforeach
</div>
@endforeach
</ul>
</div>
