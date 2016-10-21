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
      if ($user_to == $username) {
        echo $user_from . ' wants to be your your friend'.'<br><br>';
        echo '<form action="friend_requests.php" method="post">
          <input type="submit" name="acceptrequest<?php echo ' . $user_from. '; ?>" value="Accept Request">
          <input type="submit" name="ignorerequest<?php echo '.$user_from.'; ?>" value="Ignore Request">
        </form>';
      }
    }
  }
 ?>
 <?php
  if (isset($_POST['acceptrequest'.@$user_from])) {
    // Select the friend array row from the logged in user
    // Select the friend array row from the user who sent the friend request
    // If the user has no friends we just concat the friends username
    // Get friend array  for the logged in user
    $add_friend_check = mysql_query("SELECT friend_array FROM users WHERE username='$user'");
    $get_friend_row = mysql_fetch_assoc($add_friend_check);
    $friend_array = $get_friend_row['friend_array'];
    $friendArray_explode = explode(", ", $friend_array);
    $friend_array_count = count($friendArray_explode);
    // Get friend array for the person who sent the request
    $add_friend_check_friend = mysql_query("SELECT friend_array FROM users WHERE username='$user'");
    $get_friend_row_friend = mysql_fetch_assoc($add_friend_check_friend);
    $friend_array_friend = $get_friend_row['friend_array'];
    $friendArray_explode_friend = explode(", ", $friend_array_friend);
    $friend_array_count_friend = count($friendArray_explode_friend);

    if ($friend_array == "") {
      $friend_array_count = count(NULL);
    }
    if ($friend_array_friend == "") {
      $friend_array_count_friend = count(NULL);
    }
    if ($friend_array_count == NULL) {
      $add_friend_query = mysql_query("UPDATE users SET friend_array=CONCAT(friend_array,'$user_from') WHERE username='$user')");
    }
    if ($friend_array_count == NULL) {
      $add_friend_query = mysql_query("UPDATE users SET friend_array=CONCAT(friend_array,'$user_to') WHERE username='$user_from')");
    }
    if ($friend_array_count >= 1) {
      $add_friend_query = mysql_query("UPDATE users SET friend_array=CONCAT(friend_array,',$user_to') WHERE username='$user')");
    }
    echo "You are now friends";
  }
  ?>
