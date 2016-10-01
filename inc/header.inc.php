<?php include './inc/connect.inc.php'; ?>
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
        </div>
      </div>
    </div>
