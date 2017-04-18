@extends('layouts.app')

@section('content')
  <h3>Update your profile</h3>
  <div class="row">
    <div class="col-lg-6">
      <form class="form-vertical" action="{{ route('profile.edit')}}" method="post" role="form">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="control-label">
                Username
              </label>
              <input type="text" name="name" value="{{ Request::old('name') ?: Auth::user()->name }}" class="form-control" id="name">
              @if ($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
              <label for="firstName" class="control-label">
                First name
              </label>
              <input type="text" name="firstName" value="{{ Request::old('firstName') ?: Auth::user()->firstName }}" class="form-control" id="firstName">
              @if ($errors->has('firstName'))
                <span class="help-block">{{ $errors->first('firstName') }}</span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
              <label for="lastName" class="control-label">
                Last name
              </label>
              <input type="text" name="lastName" value="{{ Request::old('lastName') ?: Auth::user()->lastName }}" class="form-control" id="lastName">
              @if ($errors->has('lastName'))
                <span class="help-block">{{ $errors->first('lastName') }}</span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
              <label for="name" class="control-label">
                Location
              </label>
              <input type="text" name="location" value="{{ Request::old('location') ?: Auth::user()->location }}" class="form-control" id="location">
              @if ($errors->has('location'))
                <span class="help-block">{{ $errors->first('location') }}</span>
              @endif
            </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
        {{ csrf_field() }}
      </form>
    </div>
  </div>
@stop
