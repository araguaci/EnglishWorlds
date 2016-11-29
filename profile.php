<?php
  // Solved from https://goo.gl/zWNcLg
  ob_start();
  require_once './inc/header.inc.php';
  if ($username) {
    // Do none
  } else {
    $buffer=ob_get_contents();
    ob_end_clean();
    $buffer=str_replace("%TITLE%","Login",$buffer);
    echo $buffer;
    die('you must be logged in');
  }
  if (isset($_GET['u'])) {
    $user = mysqli_real_escape_string($db, $_GET['u']);
    $buffer=ob_get_contents();
    ob_end_clean();
    $buffer=str_replace("%TITLE%",$user,$buffer);
    echo $buffer;
    if (ctype_alnum($user)) {
      // check user exists
      $check = $db->query("SELECT username, first_name FROM users WHERE username='$user'");
      if ($check->num_rows===1 && $user != "about") {
        $get = $check->fetch_assoc();
        $theUserName = $get['username'];
        $first_name = $get['first_name'];
      } else {
        // If user doesn't exist then redirect to index
        echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/English/index.php\">";
        exit();
      }
    }
  } else {
    header("location: $username");
  }
  if (isset($_POST['PostToProfile'])) {
    $body = $_POST['PostBody'];
    if ($body != "") {
      $date_added = date("Y-m-d");
      $added_by = $user;
      $user_posted_to = $user;
      echo $body, $date_added, $added_by, $user_posted_to;
      $sqlCommand = "INSERT INTO posts VALUES(NULL, '$body', '$date_added', NOW(), '$added_by', '$user_posted_to')";
      $query = $db->query($sqlCommand);
      // or die(mysql_error());
    } else {
      echo "Post can not be empty";
    }
  }
  // Check whether the user has uploaded a profile pic or not
  $check_pic = $db->query("SELECT profile_pic FROM users WHERE username = '$user'");
  $get_pic_row = $check_pic->fetch_assoc();
  $profile_pic_db = $get_pic_row['profile_pic'];
  if (@$profile_pic_db == NULL) {
    $profile_pic = "img/default-pp.jpg";
  } else {
    $profile_pic = "userdata/profile_pic/".$profile_pic_db;
  }
    $GetListOfFriends = $db->query("SELECT friend_array FROM users WHERE username = '$user'");
    $getRow = $GetListOfFriends->fetch_assoc();
    $friend_array = explode(',', $getRow['friend_array']);
    $friendsCount = Count($friend_array);
    if ($friend_array[0] == '') {
    $friendsCount = 0;
    $getposts = $db->query("SELECT * FROM posts WHERE user_posted_to='$user' ORDER BY id DESC LIMIT 10") or die(mysql_errno());
    while ($row = $getposts->fetch_assoc()) {
      $id = $row['id'];
      $body = $row['body'];
      $date_added = $row['date_added'];
      $added_by = $row['added_by'];
      $user_posted_to = $row['user_posted_to'];
      $get_user_info = $db->query("SELECT * FROM users WHERE username='$added_by'");
      $get_info = $get_user_info->fetch_assoc();
      $profile_pic_info = $get_info['profile_pic'];
    }
  }
    $query = $db->query("SELECT bio FROM users WHERE username = '$user'");
    $get_row = $query->fetch_assoc();
    $bio = $get_row['bio'];
    if ($bio == '') {
      $bio = "No Information to show";
    }
    $isRequestSent = false;
    if (isset($_POST['addfriend'])) {
      $friend_request = $_POST['addfriend'];
      $user_to = $user;
      $user_from = $username;
      if (!$user_from == $user) {
        @$errorMsg = "You can't send a friend request to yourself!<br>";
      } else {
        $create_request = $db->query("INSERT INTO friend_requests VALUES ('', '$user_from', '$user_to')");
        $errorMsg = "Your friend request has been sent";
        $isRequestSent = true;
      }
    }elseif (isset($_POST['sendmsg'])) {
      redirect("send_msg.php?u=$user");
    } elseif (isset($_POST['unfriend'])) {
      //Friend array for logged in user
      $add_friend_check = $db->query("SELECT friend_array FROM users WHERE username='$username'");
      $get_friend_row = $add_friend_check->fetch_assoc();
      $friend_array = $get_friend_row['friend_array'];
      $friend_array_explode = explode(",", $friend_array);
      $friend_array_count = count($friend_array_explode);
      //Friend array for user who owns profile
      $add_friend_check_user = $db->query("SELECT friend_array FROM users WHERE username='$user'");
      $get_friend_row_user = $add_friend_check_user->fetch_assoc();
      $friend_array_user = $get_friend_row_user['friend_array'];
      $friend_array_explode_user = explode(",", $friend_array_user);
      $friend_array_count_user = count($friend_array_explode_user);
      $usernameComma = ",".$username;
      $usernameComma2 = $username.",";
      $userComma = ",".$user;
      $userComma2 = $user.",";
      if (strstr($friend_array_user, $usernameComma)) {
        $friend1 = str_replace("$usernameComma", "", $friend_array_user);
      }
      else
      if (strstr($friend_array_user, $usernameComma2)) {
        $friend1 = str_replace("$usernameComma2", "", $friend_array_user);
      }
      else
      if (strstr($friend_array_user, $username)) {
        $friend1 = str_replace("$username", "", $friend_array_user);
      }
      // Remove logged in user from other person's array.
      if (strstr($friend_array, $userComma)) {
        $friend2 = str_replace("$userComma", "", $friend_array);
      }
      else
      if (strstr($friend_array, $userComma2)) {
        $friend2 = str_replace("$userComma2", "", $friend_array);
      }
      else
      if (strstr($friend_array, $user)) {
        $friend2 = str_replace("$user", "", $friend_array);
      }
      $removeFriendQuery = $db->query("UPDATE users SET friend_array = '$friend1' WHERE username='$user'");
      $removeFriendQuery_user = $db->query("UPDATE users SET friend_array = '$friend2' WHERE username='$username'");
      echo "Friend Removed ...";
    }
    elseif (isset($_POST['cancelrequest'])) {
      $cancelrequest = $_POST['cancelrequest'];
      $cancelrequestquery = $db->query("DELETE FROM friend_requests WHERE user_from = '$username' AND user_to = '$user'");
    }
   // Check if the logged in user have a pending friend request
   $friendRequestCheckQuery = $db->query("SELECT id FROM friend_requests WHERE user_from = '$username' AND user_to = '$user'");
   $friendRequestCheckQueryGetRow = $friendRequestCheckQuery->fetch_assoc();
   $getCheckResult = $friendRequestCheckQueryGetRow['id'];
   if ($getCheckResult != NULL) {
     $isRequestSent = true;
   } else {
     $isRequestSent = false;
   }
   // Check if the profile owner is in the signed in user friend list or not.
   $query = $db->query("SELECT friend_array FROM users WHERE username='$username'");
   $get_friend_array_row = $query->fetch_assoc();
   $get_record = $get_friend_array_row['friend_array'];
   $get_exploded_records = explode(',', $get_record);
   list($first_record) = $get_exploded_records;
   $isFriend = false;
   foreach ($get_exploded_records as $friend) {
     if ($user == $friend || $user == $first_record) {
       $isFriend = true;
     } else {
       $isFriend = false;
     }
   }
   $message_button = "none";
   $unfriend_button = "none";
   $cancelrequest_button = "none";
   $addfriend_button = "none";
   if ($username != $user) {
     if ($isFriend) {
       $unfriend_button = "";
     } else {
       if ($isRequestSent) {
         $cancelrequest_button = "";
       } else {
          $addfriend_button = "";
       }
     }
     $message_button = "";
     foreach ($friend_array as $friend) {
       $GetImage = $db->query("SELECT profile_pic FROM users WHERE username = '$friend'");
       $getRow = $GetImage->fetch_assoc();
       echo '<a href="'.$friend.'"><img src="userdata/profile_pic/'.$getRow['profile_pic'].'" alt="'.$friend.'" title="'.$friend.'" name="FriendPhoto" height="50" width="40"/></a>&nbsp;&nbsp';
     }
   }
   ?>
 <div class="Container">
   <div class="ProfilePicture">
     <!-- TODO: Replace the navigate JS function with a way to upload picture -->
     <img id="pp" src="<?php echo $profile_pic; ?>"  alt="<?php echo $user; ?>'s Profile" title="<?php echo $user; ?>'s Profile" onclick="navigate()" />
     <div class="textHeader"><?php echo $user; ?>'s Profile</div>
     <form class="postForm" action="<?php echo $user; ?>" method="post">
       <input style="display: <?php echo $addfriend_button;?>;" type="submit" class="btn btn-sm" name="addfriend" value="Add as a friend" >
       <input style="display: <?php echo $cancelrequest_button;?>;" type="submit" class="btn btn-sm" name="cancelrequest" value="Cancel Request">
       <input style="display: <?php echo $unfriend_button;?>;" type="submit" class="btn btn-sm" name="unfriend" value="Unfriend">
       <input style="display: <?php echo $message_button;?>;" type="submit" class="btn btn-sm" name="sendmsg" value="Send a message">
     </form>
     <div class="Bio">
       <?php echo $bio; ?>
     </div>
     <div class="textHeader"><?php echo $user; ?>'s Friends <?php echo $friendsCount;?></div><br>
   </div>
   <div class="PostOnProfile">
     <form action="<?php echo $username; ?>" method="post" class="input-group">
       <input id="post" type="text" name="PostBody" placeholder="Say something (I'm not giving up on you)">
       <input type="submit" class="btn btn-lg" name="PostToProfile" value="Post">
     </form>
   </div>
 </div>
 <div class="ProfilePosts">
   <img src="userdata/profile_pic/<?php echo $profile_pic_info ?>" alt="" height="30" width="30" />
   <div class="posted_by">
     <a href="<?php echo $added_by ?>"><?php echo $added_by; ?></a>
   </div>
   &nbsp;&nbsp;<?php echo @$body; ?><br><hr>
  <div class="profileLeftSideContent">
  </div>
 <?php include './inc/footer.inc.php'; ?>
