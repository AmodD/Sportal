	<form method="POST" action="/search">
	{{ csrf_field() }}

<div class="columns">


	<div class="column is-one-quarter">
		<h1 class="title is-pulled-right">Sportal</h1>
	</div>
	<div class="column is-half">
		<p class="control has-icons-right"><input class="input" type="text" id="search" name="search" placeholder="Search Tournaments , Players , Teams ..." required>
    		<span class="icon is-right"><i class="fa fa-search"></i></span></p>
	</div>
	<div class="column is-one-quarter">
		<p class="control"><button class="button is-primary">Search</button></p>
	</div>

</div>

</form> 
