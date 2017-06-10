<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

        <title>{{ config('app.name') }}</title>

        <link rel="icon" type="image/ico" href="{{ asset('favicon.ico') }}">

        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!-- Local -->
        <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/raw.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('semantic/semantic.min.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        @yield('stylesheets')
    </head>
    <body>
        <div class="ui padded container segment">
            @include("layouts.navigation")
        </div>
        
        <div class="app-wrapper">
            @yield("app-content")
            @include('partials.message')
        </div>

        <div class="fluid container">
            @include('partials.errors')
        </div>

        <div class="footer">
            @if (Session::get('original_user'))
                <a class="mini ui button violet right floated" href="/users/switch-back">Return to your Login</a>
            @endif
            <p>&copy; {!! date('Y'); !!} <a href="">{{ config('app.name') }}</a></p>
        </div>

        <script type="text/javascript">
            var _token = '{!! Session::token() !!}';
            var _url = '{!! url("/") !!}';
        </script>
        @yield("pre-javascript")
        <script src="{{ asset('js/jquery.min.js') }}" charset="utf-8"></script>
        <script src="{{ asset('semantic/semantic.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        <script src="{{ asset('js/jquery.ns-autogrow.min.js') }}"></script>
        @yield("javascript")
    </body>
</html>
