<?php require_once './inc/header.inc.php'; ?>
<!DOCTYPE html>
<html>
  <head lang="en">
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/login.css" media="screen" title="no title">
    <title>Login</title>
    
  </head>
  <body>
  <div class="row" id="login">
  <div class="col-md-4 col-md-offset-7">
    <div class="panel panel-default">
      <div class="panel-heading">
         <span class="glyphicon glyphicon-lock"></span> Login</div>
      <div class="panel-body">
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label for="loginMail" class="col-sm-3 control-label">
           Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" name="loginMail" id="loginMail" placeholder="Email" required>
          </div>
        </div>
        <div class="form-group">
          <label for="loginPass" class="col-sm-3 control-label">
          Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="loginPass" id="loginPass" placeholder="Password" required>
          </div>
        </div>
        <div class="form-group last">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-success btn-sm">
            Sign in</button>
            <input type="submit" name="Login" class="btn btn-success btn-sm" value="Login" >
          </div>
        </div>
      </form>
    </div>
    <div class="panel-footer">
      Not Registered? <a>Register here</a></div>
    </div>
  </div>
</div>
    <!-- <div id="Wrapper">
      <form action="index.php" method="POST">
        <input type="text" name="user_login" size="25" placeholder="Username"><br><br>
        <input type="password" name="password_login" size="25" placeholder="Password"><br><br>

      </form> -->
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
