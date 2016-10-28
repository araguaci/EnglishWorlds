<?php
include '../inc/connect.inc.php';
include '../inc/functions.inc.php';
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
    <title>I am Dz And I Speak English</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen">
    <link rel="stylesheet" href="../css/profile.css" media="screen" title="no title">
    <link rel="stylesheet" href="../css/reset.css" media="screen">
    <link rel="stylesheet" href="../css/master.css" media="screen">
    <link rel="stylesheet" href="../css/blue.css" media="screen">
    <link rel="stylesheet" href="../css/main.css" media="screen">
    <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="../css/pikaday.css" media="screen" title="no title">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery-color.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/placeholder-js.js" type="text/javascript"></script>
    <script src="../js/main.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../img/favicon.ico">
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
        <a class="navbar-brand" href="../index.php">English Dz</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <!-- set class="active" to the current active list item -->
          <?php
          if ($username) {
            echo '<li><a href="../logout.php">Logout<span class="sr-only"></span></a></li>';
          } else {
            echo '<li><a href="../login.php">Login<span class="sr-only"></span></a></li>';
          }
           ?>
          <li><a href="../about/index.php">About</a></li>
          <?php
          if ($username) {
            echo '<li><a href="../profile.php">Profile<span class="sr-only"></span></a></li>';
            echo '<li><a href="../account_settings.php">Settings<span class="sr-only"></span></a></li>';
          } else {
            echo '<li><a href="../signup.php">Sign Up<span class="sr-only"></span></a></li>';
          }
           ?>
        </ul>
        <?php
        if ($username) {
          echo '<div class="navbar-text navbar-right">Signed in as <a href="'.$username.'" class="navbar-link">'.$username.'</a></div>';
        }
         ?>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
  </nav>
      </div>
    </div>
        <?php
         if ($username){
          echo '<div class="search_box">
            <form action="search.php" method="GET" id="search">
              <input type="text" name="q" value="" size="60" placeholder="Search ...">
            </form>
          </div>';
        } else {
          // Do nothing.
        }
         ?>
    <div class="page-header">
      <h1>About I am Dz and I Speak English</h1>
    </div>
    <div class="jumbotron">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
    <?php
    include '../inc/footer.inc.php';
     ?>
