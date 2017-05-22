@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="ui two column centered grid">
        <div class="column">
          <form class="ui form raised segment" role="form" method="POST" action="{{ route('register') }}">
            <div class="ui header">Register</div>
              {{ csrf_field() }}
              <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Username</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email">E-Mail Address</label>
                  <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password">Password</label>
                  <input id="password" type="password" name="password" required>

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="field">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" name="password_confirmation" required>
                </div>
              <div class="field">
                <button type="submit" class="ui primary button">
                    Register
                </button>
              </div>
          </form>
        </div>
    </div>
</div>
@endsection
@include('layouts.footer')
