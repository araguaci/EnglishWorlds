<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PXB3L2"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name') }}</title>

		<!-- Styles -->
    @yield('styles')
		<link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('semantic/semantic.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">

		<!-- Scripts -->
		<script>
				window.Laravel = {!! json_encode([
						'csrfToken' => csrf_token(),
				]) !!};
		</script>
</head>
<body>
	<div class="ui padded container segment">
		@include('layouts.nav')
	</div>
	@yield('content')
	@yield('registration')
	<!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" charset="utf-8"></script>
	<script>
	if (typeof jQuery == 'undefined') {
	    document.write(unescape("%3Cscript src='/js/jquery.min.js' type='text/javascript'%3E%3C/script%3E"));
	}
	</script>
  <script src="{{ asset('semantic/semantic.min.js')}}" charset="utf-8"></script>
	@yield('scripts')
  <script src="{{ asset('js/script.js') }}"></script>
  <script src="{{ asset('js/jquery.ns-autogrow.min.js') }}"></script>
</body>
</html>
