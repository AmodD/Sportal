@php
	$tourLink = "/tournaments/".$event->season->tournament->id ;
	$seasonLink = $tourLink."/seasons/".$event->season->id;
	$eventLink = $seasonLink."/events/".$event->id;
	$tourName = $event->season->tournament->name;
	$seasonYear = $event->season->year;
	$sportName = $event->format->sport->name;
	$formatName = $event->format->name;
@endphp       
<br>
<div class="">

<p class=""><span class="icon"><i class="fa fa-trophy"></i></span>&nbsp;&nbsp;<a href="{{ $eventLink  }}">{{ $seasonYear }}</a>
<a href="{{ $eventLink }}">{{ $event->name }}</a>
<a href="{{ $eventLink }}">&nbsp;&nbsp;{{ $tourName }} </a></p>

</div>
