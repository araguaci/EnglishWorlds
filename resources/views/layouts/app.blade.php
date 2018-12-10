<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
		<!-- Standard Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<link rel="shortcut icon" type="image/ico" href="/favicon.ico">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Site Properties -->
		<title>{{ config('app.name') }}</title>

		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
			.level {
				display: flex;
				align-items: center;
			}
			.flex {
				flex: 1;
			}
			.comments-count {
				float: right;
			}
		</style>
</head>
<body>
		@render(\English\ViewComponents\NavbarComponent::class)
		<div id="app">
			@yield('content')
		</div><!-- End of app -->
		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
