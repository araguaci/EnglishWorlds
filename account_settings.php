<?php
include './inc/header.inc.php';
if ($username) {

} else {
  die("You must be logged in to view this page!");
}
 ?>
 <?php
  if ($_POST['senddata']) {
    // If the form is submitted ....
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
