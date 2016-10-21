<?php
  include './inc/header.inc.php';
  // Friends Requests
  $findRequests = mysql_query("SELECT * FROM friend_requests WHERE user_to = '$username'");
  $numrows = mysql_num_rows($findRequests);
  if ($numrows == 0) {
    echo "No one wants to be your friend";
  }
  else {
    while ($get_row = mysql_fetch_assoc($findRequests)) {
      $id = $get_row['id'];
      $user_to = $get_row['user_to'];
      $user_from = $get_row['user_from'];
      $first_name_and_last_name_of_the_user_sending_the_friend_request =  mysql_query("SELECT first_name, last_name FROM users WHERE username = '$user_from'");
      $numrows_fn_ln = mysql_num_rows($first_name_and_last_name_of_the_user_sending_the_friend_request);
      while ($get_name = mysql_fetch_assoc($first_name_and_last_name_of_the_user_sending_the_friend_request)) {
        $first_name = $get_name['first_name'];
        $last_name = $get_name['last_name'];
        echo "$first_name $last_name wants to be your friend<br><br>";
        if ($user_to == $username) {
          echo '<form action="friend_requests.php" method="post">
            <input type="submit" name="acceptrequest '.$user_from.'" value="Accept Request">
            <input type="submit" name="ignorerequest '.$user_from.'" value="Ignore Request">
          </form>';
        }
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
