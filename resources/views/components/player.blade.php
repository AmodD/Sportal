<div class="columns">
<div class="column is-one-third">
@component('components.player-card',[
	"player" => $player
]) @endcomponent
</div>

<div class="column">
@component('components.player-personal-events',[
	"player" => $player
]) @endcomponent

@component('components.player-group-events',[
	"player" => $player
]) @endcomponent
</div>

</div>
