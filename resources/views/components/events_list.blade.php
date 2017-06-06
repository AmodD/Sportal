@php
	$tourLink = "/tournaments/".$event->season->tournament->id ;
	$seasonLink = $tourLink."/seasons/".$event->season->id;
	$eventLink = $seasonLink."/events/".$event->id;
	$tourName = $event->season->tournament->name;
	$seasonYear = $event->season->year;
	$sportName = $event->format->sport->name;
	$formatName = $event->format->name;
@endphp       

<p class="title is-5"><a href="{{ $tourLink }}">{{ $tourName  }}</a></p>
<p class="subtitle is-6"><a href="{{ $seasonLink }}">{{ $seasonYear }}</a>
<a href="{{ $eventLink }}">{{ $event->name }}</a></p>	
<br>	
