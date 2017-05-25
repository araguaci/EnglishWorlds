@extends('layouts.app')

@section('content')
<div class="ui container">
  <div class="ui two column centered grid">
    <div class="column">
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <form class="ui form raised segment" role="form" method="POST" action="{{ route('password.request') }}">
        <div class="ui header">Reset Password</div>
          {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">E-Mail Address</label>
        <input id="email" type="email" name="email" value="{{ $email or old('email') }}" required autofocus>
        @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
        </div>
        <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="password" >Password</label>
          <input id="password" type="password" name="password" required>
          @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
        <div class="field{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
          <label for="password-confirm">Confirm Password</label>
          <input id="password-confirm" type="password" name="password_confirmation" required>
          @if ($errors->has('password_confirmation'))
            <span class="help-block">
              <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
          @endif
        </div>
        <div class="field">
          <button type="submit" class="ui primary button">
            Reset Password
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@include('layouts.footer')
