<?php
// Replace E_ALL with 0 for production purposes.
error_reporting(E_ALL);
require 'connect.inc.php';
require 'functions.inc.php';
session_start();
  if (!isset($_SESSION["user_login"])) {
    $username = "";
  } else {
    $username = $_SESSION["user_login"];
  }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>%TITLE%</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen">
    <link rel="stylesheet" href="./css/profile.css" media="screen" title="no title">
    <link rel="stylesheet" href="./css/reset.css" media="screen">
    <link rel="stylesheet" href="./css/master.css" media="screen">
    <link rel="stylesheet" href="./css/blue.css" media="screen">
    <link rel="stylesheet" href="./css/main.css" media="screen">
    <link rel="stylesheet" href="./css/home.css" media="screen" title="no title">
    <link rel="stylesheet" href="./css/bootstrap.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="./css/pikaday.css" media="screen" title="no title">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-color.js"></script>
    <script src="js/script.js"></script>
    <script src="js/placeholder-js.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="./img/favicon.ico">
  </head>
  <body>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> English Dz</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <!-- set class="active" to the current active list item -->
          <?php
          if ($username) {
            echo '<li><a href="logout.php">Logout<span class="sr-only"></span> <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></li>';
          } else {
            echo '<li><a href="login.php">Login<span class="sr-only"></span> <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a></li>';
          }
           ?>
          <li><a href="./about/index.php">About <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></li>
          <?php
          if ($username) {
            echo '<li><a href="'.$username.'">Profile<span class="sr-only"></span> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>';
            echo '<li><a href="account_settings.php">Settings<span class="sr-only"></span> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a></li>';
            echo '<li><a href="my_messages.php">Messages<span class="sr-only"></span> <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></li>';

          } else {
            echo '<li><a href="signup.php">Sign Up<span class="sr-only"></span> <span class="glyphicon glyphicon-check" aria-hidden="true"></a></li>';
          }
           ?>
        </ul>
        <form class="navbar-form navbar-right" action="index.html" method="post" role="form">
          <div class="input-group">
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-user"></span>
            </span>
            <input type="text" name="name" value="" class="form-control input-sm" placeholder="Username">
          </div>
          <div class="input-group">
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-lock"></span>
            </span>
            <input type="password" name="name" value="" class="form-control input-sm" placeholder="Password">
          </div>
          <button type="submit" name="button" class="btn btn-success">Login</button>
        </form>
        <?php
         if ($username){
          echo '<form class="navbar-form navbar-left" role="search" action="header.inc.php" method="post">
            <div class="form-group">
              <input type="text" name="search" class="form-control" placeholder="Search...">
            </div>
            <button type="submit" class="btn btn-default" name="button">Search</button>
          </form>';
          echo '<div class="navbar-text navbar-right">Signed in as <a href="'.$username.'" class="navbar-link">'.$username.'</a>
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>';
        }
         ?>
         </div>
        <!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
        </nav>
