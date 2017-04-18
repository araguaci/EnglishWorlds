<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <!-- Scripts -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row usr-nav">
        <i class="col-2 offset-1">Logo</i>
      </div>
    </div >
    <div class="container">
        <div class="row usr-wlcm">
            <div class="col-8 offset-2">
                <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
        </div>
        <div class="row usr-login">
            <div class="col-3 offset-2 usr-login-sec">
                <p>Existing user?</p>
                <button class="usr-btn"><a href="{{ url('/login') }}">Login</a></button>
            </div>
            <div class="col-3 offset-2 usr-register-sec">
                <p>New user?</p>
                <button class="usr-btn"><a href="{{ url('/register') }}">Register</a></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
       <div class="row usr-footer">
         <div class="col offset-1">
           <p>&copy; 2017 Englishdz.ml - <a href="https://github.com/CaddyDz/English">Github</a> - <a href="">terms of use</a></p>
         </div>
      </div>
    </div>
  </body>
</html>
