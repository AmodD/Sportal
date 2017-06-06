<div class="column is-half is-offset-one-quarter">
<table class="table box">
  <thead>
    <tr>
      <th><abbr title="Position">Pos</abbr></th>
      <th>Team</th>
      <th><abbr title="Played">Pld</abbr></th>
      <th><abbr title="Won">W</abbr></th>
      <th><abbr title="Drawn">D</abbr></th>
      <th><abbr title="Lost">L</abbr></th>
      <th><abbr title="Goals for">GF</abbr></th>
      <th><abbr title="Goals against">GA</abbr></th>
      <th><abbr title="Goal difference">GD</abbr></th>
      <th><abbr title="Points">Pts</abbr></th>
    </tr>
  </thead>
<tbody>
@foreach($table as $team)
    <tr>
      <th>{{ $loop->iteration }}</th>
      <td><a href="{{ $team->get('link') }}" title="{{ $team->get('name') }}">{{ $team->get('name') }}</a> 
	@if($loop->iteration == 1) <strong>(C)</strong></td>@endif
	@if($loop->iteration != 1)</td>@endif
      <td>{{ $team->get('played') }}</td>
      <td>{{ $team->get('won') }}</td>
      <td>{{ $team->get('draws') }}</td>
      <td>{{ $team->get('lost') }}</td>
      <td>{{ $team->get('scored') }}</td>
      <td>{{ $team->get('accepted') }}</td>
      <td>{{ $team->get('difference') }}</td>
      <td>{{ $team->get('points') }}</td>
    </tr>
@endforeach
</tbody>
</table>
</div>

<div class="columns">
	<div class="column">
@foreach($matchdays->get('home') as $home)
<p class="has-text-right">{{ $home->get('team1') }}&nbsp;&nbsp;&nbsp;{{ $home->get('score1') }} &nbsp;&nbsp; - </p>
@endforeach
	</div>
	<div class="column">
@foreach($matchdays->get('away') as $away)
<p>{{ $away->get('score2') }}&nbsp;&nbsp;&nbsp; {{ $away->get('team2') }}</p>
@endforeach
	</div>
</div>
