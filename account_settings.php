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
          $new_password_md5 = md5($new_password);
          $password_update_query = ("UPDATE users SET password='$new_password_md5' WHERE username='$username'");
          echo "Success";
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
  <hr>
  <p>
    <b>UPDATE YOUR PROFILE INFO:</b><br>
    First Name: <input type="text" name="fname" id="fname" size="50" value="First name"><br>
    Last Name: <input type="text" name="lname" id="lname" size="50" value="Last name"><br>
    About You: <textarea name="aboutyou" id="aboutyou" rows="7" cols="40"></textarea>
  </p>
  <hr>
  <input type="submit" name="senddate" value="Save" id="sendata">
</form><br>
