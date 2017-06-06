<div class="box">
  <article class="media">
    <div class="media-left">
      <figure class="image is-64x64">
        <img src="http://bulma.io/images/placeholders/128x128.png" alt="Image">
      </figure>
    </div>
    <div class="media-content">
      <div class="content">

	<div class="columns">
	<div class="column">
	<h1>{{ $team->name }}</h1>
	<p>
          <strong>{{ $team->club->name }}</strong>  
	<br> <span class="icon"><i class="fa fa-envelope"></i></span> {{ $team->location }}
	</p>
	</div>
	<div class="column content">
	<p>
	<br><br> Website : <a class="content" href="#">
            <small>{{ $team->website }}</small><span class="icon is-small"><i class="fa fa-external-link-square"></i></span></a>
	<br> Established : {{ $team->established }}	
	  <br> Slogan : <small> {{ $team->slogan }} </small>
	</p>
	</div>
	</div>
      </div>
      <nav class="level is-mobile">
        <div class="level-left content">
          <a class="level-item">
            <span class="icon is-small"><i class="fa fa-reply"></i></span>
          </a>
          <a class="level-item">
            <span class="icon is-small"><i class="fa fa-retweet"></i></span>
          </a>
          <a class="level-item">
            <span class="icon is-small"><i class="fa fa-heart"></i></span>
          </a>
        </div>
      </nav>
    </div>
  </article>
</div>
