<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ URL::to('css/main.css') }}">
	</head>
	<body>
		@include('includes.header')
		<div class="container">
			@yield('content')
		</div>
		<div id="bootstrapCssTest" class="hidden"></div>
  <script>
    $(function() {
      if ($('#bootstrapCssTest').is(':visible')) {
        $("head").prepend('<link rel="stylesheet" href="/storage/bootstrap.min.css">');
      }
    });
  </script>
	</body>
</html>
