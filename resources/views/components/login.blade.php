<!-- icons code from bulma did not work so a suggestin was  https://github.com/jgthms/bulma/issues/479 -->
<div class="column is-half is-offset-one-quarter">
	<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
	<div class="field">
  		<p class="control has-icon">
    		<input class="input is-large" id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
    		<span class="icon is-large is-left"><i class="fa fa-envelope"></i></span>
  		</p>
                @if ($errors->has('email'))
		<p class="help is-danger"><strong>{{ $errors->first('email') }}</strong></p>
                @endif
	</div>
	<div class="field">
  		<p class="control has-icon">
    		<input class="input is-large" id="password" type="password" name="password" placeholder="Password" required>
    		<span class="icon is-large is-left"><i class="fa fa-lock"></i></span>
  		</p>
                @if ($errors->has('password'))
			<p class="help is-danger"><strong>{{ $errors->first('password') }}</strong></p>
                @endif
	</div>
	<div class="field">
  		<p class="control">
    		<label class="checkbox">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
    		</label>
		<a class="control is-pulled-right" href="{{ route('password.request') }}">Forgot Your Password?</a>
  		</p>
	</div>
	<div class="field">
  		<p class=" has-text-centered">
		<button class="button is-success">Login</button>
  		</p>
	</div>
	</form>
</div>
