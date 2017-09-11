<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link rel="icon" type="image/ico" href="/favicon.ico">
        <!-- Local -->
        <link rel="stylesheet" type="text/css" href="/css/raw.min.css">
        <link rel="stylesheet" type="text/css" href="/css/semantic.min.css">
        <link rel="stylesheet" href="/css/navbar.css">
        <link rel="stylesheet" href="/css/toastr.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        @yield('stylesheets')
    </head>
    <body>
        @include("layouts.navigation")
        <div id="app-wrapper">
            @yield("content")
            @include('partials.message')
        </div>
        <div class="fluid container">
            @include('partials.errors')
        </div>
        <script type="text/javascript">
            var _token = '{!! Session::token() !!}';
            var _url = '{!! url("/") !!}';
        </script>
        <script src="/js/jquery.min.js" charset="utf-8"></script>
        <script src="/js/semantic.min.js" charset="utf-8"></script>
        <script src="/js/app.js" charset="utf-8"></script>
        <script src="/js/script.js" charset="utf-8"></script>
        @yield("scripts")
    </body>
</html>
