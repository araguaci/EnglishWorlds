@extends('layouts.app')

@section('content')
	<div class="ui grid">
				<div class="row">
						<div class="column padding-reset">
								<div class="ui huge message page grid">
									<div id="header" class="ui huge header">
										<img src="{{ secure_asset('img/brand_100x100.png') }}" id="logo" alt="English DZ Logo">
										<span id="websiteTitle">{{ config('app.name') }}</span>
										<p id="websiteSlogan">Learn English in Algeria, the fun way</p>
									</div>
								</div>
						</div>
				</div>
		</div>
		<div class="ui raised very padded text container segment">
			<h1>Algerian English speakers social network</h1>
		</div>
@endsection

@section('registration')
	@if (!Auth::user())
		<div class="ui container" id="registrationContainer">
			<div class="ui two column centered grid">
				<div class="ui special link cards">
						<div class="card">
							<div class="blurring dimmable image">
								<div class="ui dimmer">
									<div class="content">
										<div class="center">
											<a class="ui inverted button" href="{{ secure_url('/login') }}">Login</a>
										</div>
									</div>
								</div>
								<img src="{{ secure_asset('img/user.svg') }}">
							</div>
							<div class="content">
								<a class="header">Existing user?</a>
							</div>
						</div>
						<div class="card">
							<div class="blurring dimmable image">
								<div class="ui dimmer">
									<div class="content">
										<div class="center">
											<a class="ui inverted button" href="{{ secure_url('/register') }}">Register</a>
										</div>
									</div>
								</div>
								<img src="{{ secure_asset('img/user.svg') }}">
							</div>
							<div class="content">
								<a class="header">New user?</a>
							</div>
						</div>
					</div>
				</div>
		</div>
	@endif
	@include('layouts.footer')
@endsection

@section('styles')
	<link href="{{ secure_asset('css/welcome.css') }}" rel="stylesheet">
	<link href="{{ secure_asset('css/footer.css') }}" rel="stylesheet">
@endsection

@section('scripts')
	<script src="{{ secure_asset('js/welcome.js') }}" charset="utf-8"></script>
@endsection
