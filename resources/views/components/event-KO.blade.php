
<div class="columns has-text-centered">
	<div class="column">
		<p>{{ $round }}</p>
	</div>
</div>
<div class="columns has-text-centered">
	<div class="column">
		<div class="columns">
			@foreach($matches as $match)
			<div class="column {{ $width }}">
			<table class="table is-striped">
				<tbody class="">
				@foreach($match->matchups as $matchup)
				<tr>

				@if(!$squadFlag)
				<td>	
					<p class="has-text-centered"> 
					@if($individualFlag)
					<a  href="/players/{{ $matchup->scores->unique('player')[0]->player->id }}">
					{{ $matchup->scores->unique('player')[0]->player->name }}
					</a>
					@endif
					@if(!$individualFlag)
					<a  href="/teams/{{$matchup->participant->participantable->id}}">
					{{ $matchup->participant->participantable->name }}
					</a>
					@endif
					</p> 
				</td>
				@foreach($matchup->scores as $score)
				<td>	{{ $score->score }} </td>
				@endforeach	
				@endif

				@if($squadFlag)
				<td>
					<p class="has-text-centered">
					<a  href="/teams/{{$matchup->participant->participantable->id}}">
					{{ $matchup->participant->participantable->name }}
					</a>
					</p> 
				</td>
				<td>{{ $matchup->final_score }}</td>
				@endif

				</tr>
				@endforeach
				</tbody>
			</table>
			</div>
			@endforeach
		</div>
	</div>
</div>

