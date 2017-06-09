<header class="nav">
<div class="container">
<div class="nav-left nav-menu">
	<a class="nav-item is-tab" href="/">SPORTAL</a>
</div>
<div class="nav-left nav-menu">
        @if (Auth::check())
	<a class="nav-item is-tab" href="#">Create Tournament</a>
	<a class="nav-item is-tab" href="#">Create Event</a>
	@endif
</div>
<div class="nav-right nav-menu">
        @if (Auth::guest())
	<a class="nav-item is-tab" href="{{ route('register') }}">Register</a>
	<a class="nav-item is-tab" href="{{ route('login') }}">LogIn</a>
	@else
	<a class="nav-item is-tab" href="{{ route('register') }}">{{ Auth::user()->name }}</a>
	<a class="nav-item is-tab" href="{{ route('logout') }}" 
		onclick="event.preventDefault();document.getElementById('logout-form').submit();">LogOut</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
        </form>
        @endif
</div>
</div>
</header>
