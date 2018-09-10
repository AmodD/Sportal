<nav class="breadcrumb" aria-label="breadcrumbs">
  <ul>
    <li><a href="/">Home</a></li>
    <li><a href="#">Tournaments</a></li>
    <li class="is-active"><a href="#" aria-current="page">Event</a></li>
  </ul>
</nav>

<p class="title is-1">{{ $data->name }} </p>
<br>

<div class="field is-grouped is-grouped-multiline">
  <div class="control">
    <div class="tags has-addons">
      <span class="tag is-medium is-dark">format</span>
      <span class="tag is-medium is-danger">{{ $data->format->name }}</span>
    </div>
  </div>

  <div class="control">
    <div class="tags has-addons">
      <span class="tag is-medium is-dark">level</span>
      <span class="tag is-medium is-warning">{{ $data->level->name }}</span>
    </div>
  </div>

</div>



<hr>
<div id="app">
<article class="message is-info">
  <div class="message-header">
	<p class="subtitle"><strong>Participants</strong></p>
   </div>
	<div class="message-body">
<div class="tags has-addons">
  @foreach($data->participants()->get() as $participant)
  <a class="tag is-link">{{ $participant->participantable->name }}
	<button class="delete is-small"></button>
 </a>
  @endforeach
  @if(!$data->status)
      <a @click="showModal = true ; " > 
<span class="icon has-text-info">
  <i class="fa fa-plus"></i>
</span>
</a>
  @endif
</div>
  	</div>
</article>
<article class="message is-primary">
  <div class="message-header">
<p class="subtitle"><strong>Scores</strong></p>
   </div>
</article>



<modal v-if="showModal" :dataprop=dataObj  @close="showModal = false"> 
	
	<template slot="modal-title">Add a Participant</template>
	<template slot="modal-body">
		<addparticipanttoevent :dataobj=dataObj individual="{{ $data->format->individual }}">
				<template slot="csrf-field">
				{{ csrf_field() }}
				</template>
		</addparticipanttoevent>
	</template>

</modal>

</div>
