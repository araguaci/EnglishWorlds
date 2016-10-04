<?php
include './inc/header.inc.php';
if ($username) {

} else {
  die("You must be logged in to view this page!");
}
 ?>
 <?php
 $senddata = @$_POST['senddata'];

 // Password variables
 $old_password = @$_POST['old_password'];
 $new_password = @$_POST['new_password'];
 $repeat_password = @$_POST['newpassword2'];

  if ($senddata) {
    // If the form is submitted ....
    $password_query = mysql_query("SELECT * FROM users WHERE username='$user'");
    while ($row = mysql_fetch_assoc($password_query)) {
      $db_password = $row['password'];

      // hash the old password before we check if it matches
      $old_pasword_md5 = md5($old_password);
      // Check whether old password equals $db_password
      if ($old_password == $db_password) {
        // Continue Changing the users password ...
        if ($new_password == $repeat_password) {
          if (strlen($new_password) <= 4) {
            echo "Sorry! But your password must be more than 4 characters";
          } else {
            // hash the new password before we add it to the database.
            $new_password_md5 = md5($new_password);
            $password_update_query = ("UPDATE users SET password='$new_password_md5' WHERE username='$username'");
            echo "Success";
          }
        } else {
          echo "Your two new passwords don't match!";
        }
      } else {
        echo "The old password is incorrect!";
      }
    }
  } else {
    echo "Please submit some data!";
  }

  $updateinfo = @$_POST['updateinfo'];

  // First name, last name, and about the user query
  $get_info = mysql_query("SELECT first_name, last_name, bio FROM users WHERE username='$username'");
  $get_row = mysql_fetch_assoc($get_info);
  $db_fist_name = $get_row['first_name'];
  $db_last_name = $get_row['last_name'];
  $db_bio = $get_row['bio'];

  // Submit what the user types into the database.
  if ($updateinfo) {
    $firstname = strip_tags(@$_POST['fname']);
    $lastname = strip_tags(@$_POST['lname']);
    $bio = strip_tags(@$_POST['bio']);
    if (strlen($firstname) < 3) {
      echo "Your first name must be 3 or more characters long!";
    } elseif (strlen($last_name) < 5) {
      echo "Your last name must be 5 or more characters long!";
    } else {
      // Submit the form to the database.
      $info_submit_query = mysql_query("UPDATE users SET first_name='$firstname', last_name='$lastname', bio='$bio' WHERE username='$username'");
      echo "Your Profile information has been updated";
      header("Location: $username");
    }
  } else {
    // Do nothing
  }
  ?>
 <h2>Edit Your account settings below</h2>
<hr>
<form class="" action="account_settings.php" method="post">
  <p>
    <b>Change Your Password:</b><br>
  </p>
  Your Old Password: <input type="password" name="oldpassword" id="oldpassword" size="50"><br>
  Your New Password: <input type="password" name="newpassword" id="newpassword" size="50"><br>
  Repeat Password: <input type="password" name="newpassword2" id="newpassword2" size="50"><br>
  <input type="submit" name="senddata" id="senddata" value="Update Information">
  </form>
  <hr>
  <form class="" action="account_settings.php" method="post">
    <b>UPDATE YOUR PROFILE INFO:</b><br>
    First Name: <input type="text" name="fname" id="fname" size="40" value="<?php echo $db_first_name; ?>"><br>
    Last Name: <input type="text" name="lname" id="lname" size="40" value="<?php echo $db_last_name; ?>"><br>
    About You: <textarea name="bio" id="bio" rows="7" cols="40"><?php echo $db_bio; ?></textarea>
  <hr>
  <input type="submit" name="updateinfo" value="Update Information" id="updateinfo">
  </form>
<br>
<br>
