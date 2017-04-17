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
                First name
              </label>
              <input type="text" name="name" value="{{ Request::old('name') ?: Auth::user()->name }}" class="form-control" id="name">
              @if ($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
              @endif
            </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-default">Update</button>
        </div>
        {{ csrf_field() }}
      </form>
    </div>
  </div>
@stop
