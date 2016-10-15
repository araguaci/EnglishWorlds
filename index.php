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
  $birthdate = ""; // Birthdate
  $gender = ""; // Gender
  // Registration form.
  $fn = strip_tags(@$_POST['fname']);
  $ln = strip_tags(@$_POST['lname']);
  $un = strip_tags(@$_POST['username']);
  $em = strip_tags(@$_POST['email']);
  $pswd = strip_tags(@$_POST['password']);
  $pswd2 = strip_tags(@$_POST['password2']);
  $birthdate = strip_tags(substr_replace(substr(@$_POST['birthdate'], 3, strlen(@$_POST['birthdate'])), ',', 7, 0));
  $gender = strip_tags(@$_POST['optradio']);
  $d = date("Y-m-d"); // Year - Month - Day

  if ($reg) {
    // Check if user already exists
    $u_check = mysql_query("SELECT username FROM users WHERE username='$un'");
    // Count the amount of rows where username = $un
    $check = mysql_num_rows($u_check);
    // Check whether Email already exists in the database.
      $e_check = mysql_query("SELECT email FROM users WHERE email='$em'");
    // Count the numbers of rows returned.
    $email_check = mysql_num_rows($e_check);
    if ($check == 0) {
      if ($email_check == 0) {
        if ($fn&&$ln&&$un&&$em&&$pswd&&$pswd2&&$birthdate&&$gender) {
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
                // encrypt password using md5 before sending to database
                $pswd = md5($pswd);
                $query = mysql_query("INSERT INTO users VALUES(NULL,'$un','$fn','$ln','$em', '$pswd', '$d', '0', STR_TO_DATE('$birthdate','%M %d,%Y'), '$gender', NULL, NULL, NULL)");
                die("Welcome $un Login to your account to start using the website");
              }
            }
          }else {
            echo "Your passwords don't match!";
          }
        } else {
          // check all of the fields have been filled in
          fillFields();
        }
      }
      else {
        echo "Sorry, but it looks like someone has already used that email!";
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
  <?php
  if ($username) {
    header("location: home.php");
  } else {
    include 'register.php';
  }
   ?>
<?php include './inc/footer.inc.php'; ?>
