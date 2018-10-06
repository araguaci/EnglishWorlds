@extends('layouts.app')

@section('content')

<div class="ui fluid container">
    <div class="ui two column grid">
        <div class="column centered">
          <div class="ui segments">
            <div class="ui secondary segment">
              <p>Register</p>
            </div>
            <div class="ui segment">
              <form class="ui form" method="POST" action="{{ route('register') }}">
                  @csrf

                  <div class="field {{ $errors->has('username') ? 'error' : ''}}">
                      <label for="username">Username</label>
                      <input id="username" type="text" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
                  </div>

                  @if ($errors->has('username'))
                    <div class="ui error message">
                      <div class="header">Invalid Username</div>
                      <p>{{ $errors->first('username') }}</p>
                    </div>
                  @endif

                  <div class="field {{ $errors->has('email') ? 'error' : ''}}">
                      <label for="email">Email</label>
                      <input type="email" name="email" placeholder="Email" id="email" required value="{{ old('email') }}">
                  </div>

                  @if ($errors->has('email'))
                    <div class="ui error message">
                      <div class="header">Invalid E-mail</div>
                      <p>{{ $errors->first('email') }}</p>
                    </div>
                  @endif

                  <div class="field {{ $errors->has('password') ? 'error' : ''}}">
                      <label for="password">Password</label>
                      <input type="password" name="password" placeholder="Password" id="password" required>
                  </div>

                  @if ($errors->has('password'))
                    <div class="ui error message">
                      <div class="header">Invalid Password</div>
                      <p>{{ $errors->first('password') }}</p>
                    </div>
                  @endif

                  <div class="field {{ $errors->has('password_confirmation') ? 'error' : ''}}">
                      <label for="password_confirmation">Confirm Password</label>
                      <input type="password" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation" required>
                  </div>

                  @if ($errors->has('password_confirmation'))
                    <div class="ui error message">
                      <div class="header">Incorrect Password</div>
                      <p>{{ $errors->first('password_confirmation') }}</p>
                    </div>
                  @endif

                  <div class="field">
                      <button class="ui primary button" type="submit">Register</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
