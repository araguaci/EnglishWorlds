<?php
include './inc/header.inc.php';
if ($user) {

} else {
  die("You must be logged in to view this page!")
}
 ?>
 <h2>Edit Your account settings below</h2>
<hr>
<p>
  <b>Change Your Password:</b><br>
</p>
Your Old Password: <input type="password" name="oldpassword" id="oldpassword" size="30"><br>
Your New Password: <input type="password" name="newpassword" id="newpassword" size="30"><br>
Repeat Password: <input type="password" name="newpassword2" id="newpassword2" size="30"><br>
<hr>
<p>
  <b>UPDATE YOUR PROFILE INFO:</b><br>
  <input type="text" name="name" value="">
</p>
