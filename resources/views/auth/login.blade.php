@extends('layouts.app')

@section('content')
<div class="ui container">
  <div class="ui two column centered grid">
  <div class="column">
    <form class="ui form raised segment" role="form" method="POST" action="{{ route('login') }}">
    	<div class="ui header">Login</div>
    	{{ csrf_field() }}

    	<div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
    		<label for="email">E-Mail Address</label>
    			<input id="email" type="email" name="email" value="{{ old('email') }}" autofocus autocomplete="off" required>

    			@if ($errors->has('email'))
    				<span>
    					<strong>{{ $errors->first('email') }}</strong>
    				</span>
    			@endif
    		</div>

    	<div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
    		<label for="password">Password</label>
    			<input id="password" type="password" name="password" autocomplete="off" required>

    			@if ($errors->has('password'))
    				<span>
    					<strong>{{ $errors->first('password') }}</strong>
    				</span>
    			@endif
    	</div>

    	<div class="field">
    		<div class="ui checkbox">
    			<input id="checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
    			<label for="checkbox">Remember me</label>
    		</div>
    	</div>
    	<button type="submit" class="ui primary button">Login</button>
    	<a class="btn btn-link" href="{{ route('password.request') }}">
    		Forgot Your Password?
    	</a>
      <div class="ui error message"></div>
    </form>
  </div>
  </div>
</div>
@include('layouts.footer')
@endsection

@section('scripts')
  <script src="{{ secure_asset('js/login.js') }}" charset="utf-8"></script>
@endsection
