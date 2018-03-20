@extends('layouts.app')

@section('content')

<div class="ui fluid container">
    <div class="ui two column grid">
        <div class="column centered">
          <div class="ui segments">
            <div class="ui secondary segment">
              <p>{{ __('Login') }}</p>
            </div>
            <div class="ui segment">
              <form class="ui form" method="POST" action="{{ route('login') }}">
                  @csrf

                  <div class="field {{ $errors->has('login') ? 'error' : ''}}">
                      <label for="login">{{ __('Email or username') }}</label>
                      <input id="login" type="text" name="login" placeholder="{{ __('Email or username') }}" value="{{ old('login') }}" required autofocus />
                  </div>

                  @if ($errors->has('login'))
                    <div class="ui error message">
                      <div class="header">{{ __('Invalid login') }}</div>
                      <p>{{ $errors->first('login') }}</p>
                    </div>
                  @endif

                  <div class="field {{ $errors->has('password') ? 'error' : ''}}">
                      <label>{{ __('Password') }}</label>
                      <input type="password" name="password" placeholder="{{ __('Password') }}" id="password" required>
                  </div>

                  @if ($errors->has('password'))
                    <div class="ui error message">
                      <div class="header">{{ __('Incorrect Password') }}</div>
                      <p>{{ $errors->first('password') }}</p>
                    </div>
                  @endif

                  <div class="field">
                    <div class="ui checkbox">

                      <input type="checkbox" tabindex="0" name="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label>{{ __('Remember Me') }}</label>
                    </div>
                  </div>

                  <div class="field">
                      <a class="ui button left" href="{{ route('password.request') }}">{{ __('Forgot Password') }}</a>
                      <button class="ui primary button right floated" type="submit">{{ __('Login') }}</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
