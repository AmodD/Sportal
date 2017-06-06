<div class="columns ">
        <div class="column">
          <p class="title">
	    {{ $name }}
          </p>
          <p class="subtitle">
	    {{ $shortname }} <strong>2017</strong> 
          </p>
	</div>
	<div class="column">
		<strong>start :</strong>
		<strong>end :</strong>  
	</div>
	<div class="column">

	Past Seasons :  
	  @foreach($seasons as $season)
		<a class="button is-small is-primary" href="/tournaments/{{ $tourid }}/seasons/{{ $season->id }}"><strong>{{ $season->name }}</strong> </a>
 	  @endforeach
	</div>
</div>



<div class="columns">
<div class="column is-medium">
<ul>

</ul>
</div>
</div>

<div class="column">




</div>
</div>

