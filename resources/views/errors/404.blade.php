@extends('templates.default')

@section('content')
  <h1>Oops ! looks like you had a wrong turn.</h1>
  <a href="{{ route('home') }}">Go Home!</a>
@stop
