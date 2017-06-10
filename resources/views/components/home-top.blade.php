<header class="nav">
<div class="columns container">
<div class="column is-one-quarter">
<div class="nav-left nav-menu">
	<a class="nav-item is-tab" href="/">SPORTAL</a>
        @if (Auth::check())
<!--	<a class="nav-item is-tab" href="#">Create Tournament</a>
	<a class="nav-item is-tab" href="#">Create Profile</a> -->
	@endif
</div>
</div>
<div class="column is-half">
@if(Route::currentRouteName() != 'main')
	<form method="POST" action="/search">
	{{ csrf_field() }}
		<p class="control has-icons-right"><input class="input is-outlined" style="margin-top:7px;" type="text" id="search" name="search" placeholder="Search Tournaments , Players , Teams ..." required>
    		<span class="icon is-right" style="margin-top:7px;"><i class="fa fa-search"></i></span>
</p>
	</form>
@endif
</div>
<div class="column is-one-quarter">
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

</div>

</header>



