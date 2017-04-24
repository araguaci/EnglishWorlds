<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bootstrap Tutorial</title>
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('css/bootstrap/style.css') }}">
	</head>
	<body>
		<div class="container">
			<div class="page-header">
				<h1>Bootstrap Tutorial</h1>
			</div>
			<div class="jumbotron">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<p>
					<a href="#" class="btn btn-default btn-lg" role="button">More Info</a>
					<button type="submit" class="btn btn-danger" role="button">Button</button>
					<input type="button" value="Info" class="btn btn-info">
					<button type="submit" class="btn-primary btn-sm">Primary</button>
					<button type="submit" class="btn btn-success btn-xs">Success</button>
					<button type="submit" class="btn btn-warning btn-lg">Warning</button>
					<button type="submit" class="btn btn-link btn-lg">Link</button>
					<button type="button" class="btn btn-lg btn-primary" disabled="disabled">Primary</button>
				</p>
			</div>
		</div>
		<script src="{{ asset('js/app.js') }}"></script>
	</body>
</html>
