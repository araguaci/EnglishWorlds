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
      <form class="ui form raised segment" role="form" method="POST" action="{{ route('password.email') }}">
        <div class="ui header">Reset Password</div>
        {{ csrf_field() }}
        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email">E-Mail Address</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" required>
          @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>
        <div class="field">
          <button type="submit" class="ui primary button">
            Send Password Reset Link
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@include('layouts.footer')
