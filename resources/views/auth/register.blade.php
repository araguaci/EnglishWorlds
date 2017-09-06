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
                <input id="name" type="text" name="name" value="{{ old('name') }}"  autofocus required>
                @if ($errors->has('name'))
                    <span>
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email">E-Mail Address</label>
                  <input id="email" type="text" name="email" value="{{ old('email') }}" required>
                  @if ($errors->has('email'))
                      <span>
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password">Password</label>
                  <input id="password" type="password" name="password" required>
                  @if ($errors->has('password'))
                      <span>
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
              <div class="ui error message"></div>
          </form>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection

@section('scripts')
  <script src="{{ secure_asset('js/register.js') }}" charset="utf-8"></script>
@endsection
