<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="./img/favicon.ico">
    <link rel="stylesheet" href="./css/signup.css" media="screen" title="no title">
    <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen">
    <link rel="stylesheet" href="./css/profile.css" media="screen" title="no title">
    <link rel="stylesheet" href="./css/reset.css" media="screen">
    <link rel="stylesheet" href="./css/master.css" media="screen">
    <link rel="stylesheet" href="./css/blue.css" media="screen">
    <link rel="stylesheet" href="./css/main.css" media="screen">
    <link rel="stylesheet" href="./css/bootstrap.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="./css/pikaday.css" media="screen" title="no title">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-color.js"></script>
    <script src="js/script.js"></script>
    <script src="js/placeholder-js.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
    <script src="./js/bootstrap.min.js"></script>
    <title>Register new user</title>
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
        <a class="navbar-brand" href="index.php">English Dz</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <!-- set class="active" to the current active list item -->
          <?php
          if (!isset($_SESSION["user_login"])) {
            $username = "";
          } else {
            $username = $_SESSION["user_login"];
          }
          if ($username) {
            echo '<li><a href="logout.php">Logout<span class="sr-only"></span></a></li>';
          } else {
            echo '<li><a href="login.php">Login<span class="sr-only"></span></a></li>';
          }
           ?>
          <li><a href="./about/index.php">About</a></li>
          <?php
          if ($username) {
            echo '<li><a href="profile.php">Profile<span class="sr-only"></span></a></li>';
            echo '<li><a href="account_settings.php">Settings<span class="sr-only"></span></a></li>';
          } else {
            echo '<li><a href="signup.php">Sign Up<span class="sr-only"></span></a></li>';
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
    <div id="Registration" style="width: 900px; float: center; margin: 0px auto 0px auto;">
      <table>
        <tr>
          <td width="50%" valign="top" id="loginTD">
            <h2>Already a member?<br><br> Sign in below!</h2>
            <form action="index.php" name="loginForm" method="POST" onsubmit="return validateLoginForm()">
              <input type="text" name="user_login" size="25" placeholder="Username"><br><br>
              <input type="password" name="password_login" size="25" placeholder="Password"><br><br>
              <input type="submit" class="btn btn-sm" name="Login" value="Login">
            </form>
          </td>
          <td width="30%" valign="top" id="registerTD">
            <h2>Sign Up Below!</h2>
            <form action="index.php" name="Registration" method="POST">
              <input type="text" name="fname" size="25" placeholder="First Name" onKeyup="checkRegister()" onblur="focusRegister()"><span class="glyphicon glyphicon-exclamation-sign hidden" aria-hidden="true" hidden="false"></span><br><br>
              <input type="text" name="lname" size="25" placeholder="Last Name" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
              <input type="text" name="username" size="25" placeholder="Username" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
              <input type="text" name="email" size="25" placeholder="Email Address" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
              <input type="password" name="password" size="25" placeholder="Password" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
              <input type="password" name="password2" size="25" placeholder="Confirm your password" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
              <input type="text" name="birthdate" id="datepicker" value="2 Oct 1994" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
              <div>I am:
                <label class="radio-inline"><input type="radio" name="optradio" value="m">Male</label>
                <label class="radio-inline"><input type="radio" name="optradio" value="f">Female</label>
              </div><br>
              <input type="submit" id="register" class="btn btn-sm" name="reg" value="Sign Up!" disabled="disabled">
              <?php function fillFields()
              {
                echo '<div class="alert alert-danger" role="alert">Please fill in all of the fields</div>';
              } ?>
            </form>
          </td>
        </tr>
      </table>
    </div>
    <script src="./js/pikaday.js"></script>
    <script>
    var picker = new Pikaday(
    {
        field: document.getElementById('datepicker'),
        firstDay: 1,
        minDate: new Date(1985, 0, 1),
        maxDate: new Date(2000, 12, 31),
        yearRange: [1985,2000]
    });
    </script>

  </body>
</html>
