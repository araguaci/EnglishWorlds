<?php include './inc/header.inc.php'; ?>
<?php
  $reg = @$_POST['reg'];
  // Declaring variables to prevent errors.
  $fn = ""; // First Name.
  $ln = ""; // Last Name.
  $un = ""; // Username.
  $em = ""; // Email.
  $pswd = ""; // Password.
  $pswd2 = ""; // Password confirmation.
  $d = ""; // Sign up date.
  $u_check = ""; // Check is username exists;
  // Registration form.
  $fn = strip_tags(@$_POST['fname']);
  $ln = strip_tags(@$_POST['lname']);
  $un = strip_tags(@$_POST['username']);
  $em = strip_tags(@$_POST['email']);
  $pswd = strip_tags(@$_POST['password']);
  $pswd2 = strip_tags(@$_POST['password2']);
  $d = date("Y-m-d"); // Year - Month - Day

  if ($reg) {
    // Check if user already exists
    $u_check = mysql_query("SELECT username FROM users WHERE username='$un'");
    // Count the amount of rows where username = $un
    $check = mysql_num_rows($u_check);
    if ($check == 0) {
      // check all of the fields have been filled in
      if ($fn&&$ln&&$un&&$em&&$pswd&&$pswd2) {
        // check that password match
        if ($pswd==$pswd2) {
          // check the maximum length of username/first name/last name does not exceed 25 characters
          if (strlen($un)>25||strlen($fn)>25||strlen($ln)>25){
            echo "The maximum limit for username/first name/last name is 25 characters!";
          } else {
            // check the maximum length of password does not exceed 25 characters and it is not less than 5 characters
            if (strlen($pswd)>30||strlen($pswd)<5) {
              echo "Your password must be between 5 and 30 characters long!";
            } else {
              // encrypt password and password 2 using md5 before sending to database
              $pswd = md5($pswd);
              $pswd2 = md5($pswd2);
              $query = mysql_query("INSERT INTO users VALUES(NULL,'$un','$fn','$ln','$em', '$pswd', '$d', '0')");
              die("<h2>Welcome to Dz English</h2>Login to your account to get started ...");
            }
          }
        }else {
          echo "Your passwords don't match!";
        }
      } else {
        echo "Please fill in all of the fields";
      }
    }else {
      echo "Username already taken ...";
    }
  }
// User Login Code.
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
    <div style="width: 800px; margin: 0px auto 0px auto;">
      <table>
        <tr>
          <td width="60%" valign="top">
            <h2>Already a member? Sign in below!</h2>
            <form class="" action="index.php" method="POST">
              <input type="text" name="user_login" size="25" placeholder="Username"><br><br>
              <input type="password" name="password_login" size="25" placeholder="Password"><br><br>
              <input type="submit" name="Login" value="Login">
            </form>
          </td>
          <td width="40%" valign="top">
            <h2>Sign Up Below!</h2>
            <form class="" action="index.php" method="POST">
              <input type="text" name="fname" size="25" placeholder="First Name"><br><br>
              <input type="text" name="lname" size="25" placeholder="Last Name"><br><br>
              <input type="text" name="username" size="25" placeholder="Username"><br><br>
              <input type="text" name="email" size="25" placeholder="Email Address"><br><br>
              <input type="password" name="password" size="25" placeholder="Password"><br><br>
              <input type="password" name="password2" size="25" placeholder="Confirm your password"><br><br>
              <input type="submit" name="reg" value="Sign Up!">
            </form>
          </td>
        </tr>
      </table>
    </div>
<?php include './inc/footer.inc.php'; ?>
