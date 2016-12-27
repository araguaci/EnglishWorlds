<?php
    // Replace E_ALL with 0 for production purposes.
    error_reporting(E_ALL ^ E_NOTICE);
    header('Cache-control: private'); // IE 6 Fix
    // always modified
    header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
    // HTTP/1.1
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', false);
    // HTTP/1.0
    header('Pragma: no-cache');
    require 'connect.inc.php';
    require 'functions.inc.php';
    session_start();
    $cookie_name = 'siteAuth';
    $cookie_time = (3600 * 24 * 30); // 30 days
    if (!isset($_SESSION["user_login"])) {
      $username = "";
    } else {
      $username = $_SESSION["user_login"];
    }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="http://localhost/English/" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>%TITLE%</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen" title="no title">
    <link rel="stylesheet" type="text/css" href="./css/profile.css" media="screen" title="no title">
    <link rel="stylesheet" type="text/css" href="./css/reset.css" media="screen" title="no title">
    <link rel="stylesheet" type="text/css" href="./css/master.css" media="screen" title="no title">
    <link rel="stylesheet" type="text/css" href="./css/blue.css" media="screen" title="no title">
    <link rel="stylesheet" type="text/css" href="./css/main.css" media="screen" title="no title">
    <link rel="stylesheet" type="text/css" href="./css/home.css" media="screen" title="no title">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" media="screen" title="no title">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" media="screen" title="no title">
    <link rel="stylesheet" type="text/css" href="./css/pikaday.css" media="screen" title="no title">
    <link rel="stylesheet" type="text/css" href="./css/login.css" media="screen" title="no title">
    <link rel="stylesheet" type="text/css" href="./css/messages.css" media="screen" title="no title">
    <script src="./js/jquery.js" type="text/javascript"></script>
    <script src="./js/jquery-ui.js" type="text/javascript"></script>
    <script src="./js/jquery.min.js" type="text/javascript"></script>
    <script src="./js/jquery-color.js" type="text/javascript"></script>
    <script src="./js/script.js" type="text/javascript"></script>
    <script src="./js/messages.js" type="text/javascript"></script>
    <script src="./js/placeholder-js.js" type="text/javascript"></script>
    <script src="./js/main.js" type="text/javascript"></script>
    <script src="./js/login.js" type="text/javascript"></script>
    <script src="./js/home.js" type="text/javascript"></script>
    <script src="./js/profile.js" type="text/javascript"></script>
    <script src="./js/bootstrap.js" type="text/javascript"></script>
    <script src="./js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="./img/favicon.ico">
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php" title="Home Page"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> English Dz</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <!-- set class="active" to the current active list item -->
          <?php
          if ($username) {
            echo '<li><a href="logout.php" title="Disconnect my account">Logout<span class="sr-only"></span> <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></li>';
          } else {
            echo '<li><a href="login.php" title="Log into my account">Login<span class="sr-only"></span> <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a></li>';
          }
           ?>
          <li><a href="./about/index.php" title="About the website">About <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></li>
          <?php
          $count_of_unread_messages_query = $db->query("SELECT COUNT(id) AS count FROM pvt_messages WHERE user_to = '$username' AND opened = 'no'");
          $get_row = $count_of_unread_messages_query->fetch_assoc();
          if ($get_row['count'] != '0') {
            $count_of_unread_messages = $get_row['count'];
          } else {
            $count_of_unread_messages = '';
          }
          if ($username) {
            echo '<li><a href="'.$username.'" title="My profile">Profile<span class="sr-only"></span> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>';
            echo '<li><a href="account_settings.php" title="Change account settings">Settings<span class="sr-only"></span> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a></li>';
            echo '<li><a href="my_messages.php" title="View my inbox">Messages '.$count_of_unread_messages.'<span class="sr-only"></span> <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></li>';

          } else {
            echo '<li><a href="signup.php" title="Register new user">Sign Up <span class="sr-only"></span> <span class="glyphicon glyphicon-check" aria-hidden="true"></span></a></li>';
          }
           ?>
        </ul>
        <?php
          if (!$username) {
            echo '<form class="navbar-form navbar-right" action="'.$_SERVER['PHP_SELF'].'" method="post" role="form">
              <div class="input-group">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-user"></span>
                </span>
                <input type="text" name="name" class="form-control input-sm" placeholder="Username" title="Enter your username here">
              </div>
              <div class="input-group">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-lock"></span>
                </span>
                <input type="password" name="name" class="form-control input-sm" placeholder="Password" title="Enter your password here">
              </div>
              <button type="submit" name="button" class="btn btn-success" title="Log into your account">Login</button>
            </form>';
          }
         ?>
        <?php
         if ($username){
          echo '<form class="navbar-form navbar-left" role="search" action="'.$_SERVER['PHP_SELF'].'" method="post">
            <div class="form-group">
              <input type="text" name="search" class="form-control" placeholder="Search..." title="Search for people, posts and more...">
            </div>
            <button type="submit" class="btn btn-default" name="button" title="Click enter to perform the search">Search</button>
          </form>';
          echo '<div class="navbar-text navbar-right" title="Currently logged in user">Signed in as <a href="'.$username.'" class="navbar-link">'.$username.'</a>
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>';
        }
         ?>
         </div>
      </div>
        </nav>
