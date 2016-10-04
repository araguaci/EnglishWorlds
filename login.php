<!DOCTYPE html>
<html>
  <head lang="en">
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/login.css" media="screen" title="no title">
    <title>Login</title>
    <link rel="shortcut icon" href="./img/favicon.ico">
  </head>
  <body class="wrapper">
    <div id="Wrapper">
      <form action="index.php" method="POST">
        <input type="text" name="user_login" size="25" placeholder="Username"><br><br>
        <input type="password" name="password_login" size="25" placeholder="Password"><br><br>
        <input type="submit" name="Login" value="Login">
      </form>
    </div>
  </body>
</html>
<?php
  if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
    $user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); // filter everything but numbers and letters.
    $password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); // filter everything but numbers and letters.
    $password_login_md5 = md5($password_login);
    $sql = mysql_query("SELECT id FROM users WHERE username='$user_login' AND password='$password_login_md5' LIMIT 1");
    // Check for their existance
    $userCount = mysql_num_rows($sql); // Count the number of rows returned
    if ($userCount == 1) {
      while ($row = mysql_fetch_array($sql)) {
        $id = $row["id"];
      }
        $_SESSION["user_login"] = $user_login;
        header("location: home.php");
        exit();
    } else {
      echo "Login incorrect, try again";
      exit();
    }
  }
 ?>
