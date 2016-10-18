<?php
  include './inc/header.inc.php';
  // Find Friends Requests
  $findRequests = mysql_query("SELECT * FROM friend_requests WHERE user_to = '$username'");
  $numrows = mysql_num_rows($findRequests);
  if ($numrows == 0) {
    echo "You have no friend requests at this time";
  } else {
    while ($get_row = mysql_fetch_assoc($findRequests)) {
      $id = $get_row['id'];
      $user_to = $get_row['user_to'];
      $user_from = $get_row['user_from'];
      echo '' . $user_to . ' wants to be your your friend';
    }
  }
 ?>
 <?php
  if (isset($_POST['acceptrequest'.$user_from])) {
    echo "Friend Request accepted";
  }
  ?>
<form action="friend_requests.php" method="post">
  <input type="submit" name="acceptrequest<?php echo $user_from; ?>" value="Accept Request">
  <input type="submit" name="ignorerequest<?php echo $user_from; ?>" value="Ignore Request">
</form>
