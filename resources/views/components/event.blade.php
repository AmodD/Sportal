<div class="columns">
	<div class="column has-text-centered">
		<p class="title">{{ $season->name }} {{ $tournament->name }} {{ $season->year }} </p>
		<p class="subtitle">{{ $event->name }}</p>
	</div>
</div>
@if($event->type == 'L')
@component('components.event-L',[
	"round" => "League",
	"table" => $table,
	"matchdays" => $matchdays
]) @endcomponent
@endif

@if($event->type == 'KO')
@component('components.event-KO',[
	"round" => "FINAL",
	"width" => "is-half is-offset-one-quarter",
	"matches" => $matches->where("round_id",1),
	"squadFlag" => $event->format->squad,
	"individualFlag" => $event->format->individual,
	"winnerIcon" => '<span class="icon"><i class="fa fa-trophy"></i></span>'
]) @endcomponent

@component('components.event-KO',[
	"round" => "SEMI-FINALS",
	"width" => "is-half",
	"matches" => $matches->where("round_id",2),
	"squadFlag" => $event->format->squad,
	"individualFlag" => $event->format->individual,
	"winnerIcon" => ""
]) @endcomponent

@component('components.event-KO',[
	"round" => "QUARTER-FINALS",
	"width" => "is-one-quarter",
	"matches" => $matches->where("round_id",3),
	"squadFlag" => $event->format->squad,
	"individualFlag" => $event->format->individual,
	"winnerIcon" => ""
]) @endcomponent
@endif
