<?php
include './inc/connect.inc.php';
session_start();
$username = "";
if (!isset($_SESSION["user_login"])) {
  // $username = $_SESSION["user_login"];
} else {
  $username = $_SESSION["user_login"];
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dz English</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen">
    <link rel="stylesheet" href="./css/master.css" media="screen">
    <link rel="stylesheet" href="./css/blue.css" media="screen">
    <link rel="stylesheet" href="./css/main.css" media="screen">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-color.js"></script>
    <script src="js/script.js"></script>
    <script src="js/placeholder-js.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="mashmenu">
      <div id="menuWrapper">
        <div class="fnav">
          <a href="index.php" class="flink">Find Friends</a>
          <div class="allContent">
            <div class="snav">
              <a href="./about/index.html" class="slink">About</a>
              <div class="insideContent">
                <span class="featured">What is it?<br><a href="https://www.facebook.com/groups/IAMALGERIANANDISPEAKENGLISH/">Group</a>
                </span>
              </div>
              <!-- End inside content. -->
            </div>
            <!-- End snav -->
            <div class="snav">
              <a href="#" class="slink">Open Source?</a>
              <div class="insideContent">
                <span class="featured"></span>
              </div>
              <!-- End inside content. -->
            </div>
            <!-- End snav -->
            <div class="snav">
              <a href="https://www.facebook.com/Saly3301" class="slink">Developer account</a>
              <div class="insideContent">
                <span class="featured"></span>
              </div>
              <!-- end snav -->
            </div>
          </div>
          <!-- End All content. -->
        </div>
        <!-- End fnav -->
        <?php
        if (!$username) {
          echo '<div class="fnav">
            <a href="index.php" class="flink">Sign Up</a>
          </div>
          <!-- end fnav -->
          <div class="fnav">
            <a href="index" class="flink">Login</a>
          </div>
          <!-- end fnav -->';
        } else {
          echo '<div class="fnav">
            <a href="'.$username.'" class="flink">Profile</a>
          </div>
          <!-- end fnav -->
          <div class="fnav">
            <a href="account_settings.php" class="flink">Account settings</a>
          </div>
          <div class="fnav">
            <a href="logout.php" class="flink">Logout</a>
          </div>
          <!-- end fnav -->';
        }

        ?>
        <!-- <div class="feat">
          <form id="searchForm">
            <fieldset>
              <div class="input">
                <input type="text" class="Search" id="s" value="Search Dz English...">
              </div>
              <input type="submit" id="searchSubmit" value="">
            </fieldset>
          </form>
        </div> -->
      </div>
    </div>
    <div class="headerMenu">
      <div id="wrapper">
        <div class="logo">
          <img src="./img/find_friends_logo.png" alt="Find Friends logo" />
        </div>
        <div class="search_box">
          <form action="search.php" method="GET" id="search">
            <input type="text" name="q" value="" size="60" placeholder="Search ...">
          </form>
        </div>
        <div id="menu">
          <a href="#">Home</a>
          <a href="#">About</a>
          <a href="#">Sign Up</a>
          <a href="#">Sign In</a>
         </div><!-- end fnav feat -->
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
