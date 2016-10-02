<?php
include './inc/connect.inc.php';
session_start();
if (!isset($_SESSION["user_login"])) {

} else {
  $username = $_SESSION["user_login"];
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dz English</title>
    <link rel="stylesheet" href="./css/style.css" media="screen" title="no title">
  </head>
  <body>
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
          <form id="searchForm">
            <fieldset><div class="input">
              <input type="text" class="Search" id="s" value="Search Dz English...">
            </div>
            <input type="submit" id="searchSubmit" value="">
          </fieldset>
          </form>
         </div><!-- end fnav feat -->
      </div>
    </div>
    <div id="wrapper">

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
