@extends('layouts.app')

@section('content')

<div class="jumbotron">
	<div class="usr-wlcm">
		<p><h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h1></p>
	</div>
</div>

<div class="row usr-login">
	<div class="col-lg-3 col-sm-8 offset-lg-2 offset-sm-2 usr-login-sec">
		<p>Existing user?</p>
		<a class="usr-btn" href="{{ url('/login') }}">Login</a>
	</div>
	<div class="col-lg-3 col-sm-8 offset-lg-2 offset-sm-2 usr-register-sec">
		<p>New user?</p>
		<a class="usr-btn" href="{{ url('/register') }}">Register</a>
	</div>
</div>

@stop
