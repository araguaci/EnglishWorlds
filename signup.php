<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/signup.css" media="screen" title="no title">
    <title>Register new user</title>
  </head>
  <body>
    <?php
      require_once './inc/header.inc.php';
      include 'register.html';
      if (isset(@$_POST['Registration'])) {
        echo "test";
      }
     ?>
  </body>
</html>
