<article class="message is-warning">
  <div class="message-header">
    <p>Team Members</p>
    <button class="delete"></button>
  </div>
  <div class="message-body content">
 <ol>
@foreach($players as $player)
<li><a href="/players/{{ $player->id }}">{{ $player->name }} </a> </li>
@endforeach
</ol> 
 </div>
</article>

