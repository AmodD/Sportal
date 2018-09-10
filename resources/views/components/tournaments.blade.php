
<div id="app" class="column is-half is-offset-one-quarter">
@foreach($data as $tour)
<div class="card">
  <header class="card-header">
    <p class="card-header-title">
   <a id="displayText{{ $tour->id }}" href="javascript:toggle('{{ $tour->id }}','{{ $tour->name }}');">{{ $tour->name }} </a> 
    </p>
  </header>
  <div  id="toggleText{{ $tour->id }}" style="display: none"class="card-content">
    <div class="">
	<div class="field"><a  class="button is-warning is-small">Update Tournament Details</a></div> 
	<div class="field">
			@foreach($tour->seasons()->get() as $season)
			<strong> {{ $season->name }} season</strong>

			<table class="table">
				<thead>
				 </thead>
				 <tbody>
					@foreach($season->events()->get() as $event)
				     		<tr><td><a href="/events/{{ $event->id }}/edit">{{ $event->name }}</a></td></tr>	
					@endforeach
						<tr><td>
      <a @click="showModal = true ; dataObj.tour = {{  $tour  }}; dataObj.season = {{  $season  }}; " class="button is-primary is-small">Add Events</a> 
						</td></tr>
				 </tbody>
			</table>	

			@endforeach
			<div class="field"><a class="button is-success is-small">Add Another Season</a></div> 
		  </div>	

    </div>
  </div>
</div>
<br>
@endforeach

<modal v-if="showModal" :dataprop=dataObj  @close="showModal = false"> 
	
	<template slot="modal-title">Add an Event</template>
	<template slot="modal-body">
		<addevent :formats="{{ $formats->toJson() }}"
			  :levels="{{ $levels->toJson() }}"
			  :dataobj=dataObj
>
				<template slot="csrf-field">
				{{ csrf_field() }}
				</template>
		</addevent>
	</template>

</modal>

</div>


<script language="javascript">
function toggle(id,name) {
	var ele = document.getElementById("toggleText"+id);
	var text = document.getElementById("displayText"+id);
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = name;
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = name;
	}
}
</script>


