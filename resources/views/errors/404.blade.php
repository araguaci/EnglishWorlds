@extends('layouts.app')

@section('content')
  <div class="ui container">
    <div class="ui centered segment">
      <div class="ui error message">
        <div class="header">
            Oops ! looks like you had a wrong turn.
        </div>
        <a href="{{ route('home') }}">Go Home!</a>
      </div>
    </div>
  </div>
@stop
