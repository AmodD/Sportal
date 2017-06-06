
<div class="card">
  <div class="card-image">
    <figure class="image is-4by3">
      <img src="http://bulma.io/images/placeholders/1280x960.png" alt="Image">
    </figure>
  </div>
  <div class="card-content">
    <div class="media">
      <div class="media-left">
        <figure class="image is-48x48">
          <img src="http://bulma.io/images/placeholders/96x96.png" alt="Image">
        </figure>
      </div>
      <div class="media-content">
        <strong><a>{{ $player->name }}</a></strong>
        <p class="is-6">{{ $player->age() }} years old</p>
      </div>
    </div>

    <div class="content">
      <br>
      <small><span class="icon"><i class="fa fa-calendar-check-o"></i></span> {{ $player->dateOfBirth() }}</small>
      <br><br>
 <span class="icon"><i class="fa fa-quote-left"></i></span> <em>{{ $player->quote }}</em> <span class="icon"><i class="fa fa-quote-right"></i></span>
    </div>
  </div>
</div>
