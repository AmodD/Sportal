<div class="columns">
	<div class="column">
	<p class="title">
	{{ $name }} {{ $tournament->name }} 
	</p>
	{{ $year }}
	</div>
	<div class="column">
		<strong>start :</strong>{{ $start }}
		<strong>end :</strong>{{ $end }}  
	</div>

</div>


<div class="columns">
<div class="column is-medium content">
<ul>
@foreach($events as $event )
<li><a class="button is-small is-primary" href="/tournaments/{{ $tournament->id}}/seasons/{{ $seasonid }}/events/{{ $event->id }}"><strong>{{ $event->name }}</strong> </a></li>
@endforeach
</ul>
</div>
</div>
