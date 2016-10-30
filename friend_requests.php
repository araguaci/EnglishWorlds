<?php
  include './inc/header.inc.php';
  // Friends Requests
  $findRequests = $db->query("SELECT * FROM friend_requests WHERE user_to = '$username'");
  if ($findRequests->num_rows == 0) {
    echo "No one wants to be your friend";
  }
  else {
    while ($get_row = $findRequests->fetch_assoc()) {
      $id = $get_row['id'];
      $user_to = $get_row['user_to'];
      $user_from = $get_row['user_from'];
      $first_name_and_last_name_of_the_user_sending_the_friend_request =  $db->query("SELECT first_name, last_name FROM users WHERE username = '$user_from'");
      while ($get_name = $first_name_and_last_name_of_the_user_sending_the_friend_request->fetch_assoc()) {
        $first_name = $get_name['first_name'];
        $last_name = $get_name['last_name'];
        echo capitalize($first_name),' ', capitalize($last_name), ' wants to be your friend<br>';
        if ($user_to == $username) {
          echo '<form action="friend_requests.php" method="post">
            <input type="submit" name="acceptrequest'.$user_from.'" value="Accept Request">
            <input type="submit" name="ignorerequest'.$user_from.'" value="Ignore Request">
          </form>';
        }
      }
    }
  }
 ?>
 <?php
  if (isset($_POST['acceptrequest'.@$user_from])) {
    $add_friend_check = $db->query("SELECT friend_array FROM users WHERE username='$username'");
    $get_friend_row = $add_friend_check->fetch_assoc();
    $friend_array = $get_friend_row['friend_array'];
    $friendArray_explode = explode(", ", $friend_array);
    $friend_array_count = count($friendArray_explode);
    $add_friend_check_friend = $db->query("SELECT friend_array FROM users WHERE username='$user_from'");
    $get_friend_row_friend = $add_friend_check_friend->fetch_assoc();
    $friend_array_friend = $get_friend_row['friend_array'];
    $friendArray_explode_friend = explode(", ", $friend_array_friend);
    $friend_array_count_friend = count($friendArray_explode_friend);
    if ($friend_array_friend == NULL) {
      $add_friend_query = $db->query("UPDATE users SET friend_array='$user_from' WHERE username='$username'");
    } else {
      $add_friend_query = $db->query("UPDATE users SET friend_array=CONCAT(friend_array,', $user_from') WHERE username='$username'");
    }
    if ($friend_array == NULL) {
      $add_friend_query = $db->query("UPDATE users SET friend_array='$username' WHERE username='$user_from'");
    } else {
      $add_friend_query = $db->query("UPDATE users SET friend_array=CONCAT(friend_array,', $username') WHERE username='$user_from'");
    }
    $remove_friend_request = $db->query("DELETE FROM friend_requests WHERE user_from = '$user_from'");
  }
  ?>
