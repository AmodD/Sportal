<div class="columns">
<div class="column is-one-third">
@component('components.player-card',[
	"player" => $player
]) @endcomponent
</div>

<div class="column">

<script language="javascript"> 
function toggle(sport) {
	var sportName = sport;
	var ele = document.getElementById(sportName+"toggleText");
	var text = document.getElementById(sportName+"displayText");

	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = sportName;
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = sportName;
	}
} 
</script>
 

@component('components.player-personal-events',[
	"player" => $player
]) @endcomponent

@component('components.player-group-events',[
	"player" => $player
]) @endcomponent
</div>

</div>
