<?php
  include './inc/header.inc.php';
  if ($username) {
    // Do none
  } else {
    die('you must be logged in');
  }
  if (isset($_GET['u'])) {
    $user = mysqli_real_escape_string($db, $_GET['u']);
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
  $post = @$_POST['post'];
  if ($post != "") {
  $date_added = date("Y-m-d");
  $added_by = $user;
  $user_posted_to = $user;
  $sqlCommand = "INSERT INTO posts VALUES('', '$post', '$date_added', '$added_by', '$user_posted_to')";
  $query = $db->query($sqlCommand) or die(mysql_error());
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
 ?>
 <br>
 <!-- TODO: Replace the navigate JS function with a way to upload picture -->
 <img id="pp" src="<?php echo $profile_pic; ?>" height="250" width="200" alt="<?php echo $user; ?>'s Profile" title="<?php echo $user; ?>'s Profile" onclick="navigate()" />
 <br>
 <!-- <div class="postForm">
   <form action="<?php // echo $user; ?>" method="post">
     <textarea id="post" name="post" rows="4" cols="58"></textarea>
     <input type="submit" class="btn btn-lg" name="send" value="Post" style="background-color: #DCE5EE; border: 1px solid #666; color:#666; height: 73px; width: 65px;">
   </form>
 </div> -->
 <div class="profilePosts">
   <?php
   $getposts = $db->query("SELECT * FROM posts WHERE user_posted_to='$user' ORDER BY id DESC LIMIT 10") or die(mysql_errno());
   while ($row = $getposts->fetch_assoc()) {
     $id = $row['id'];
     $body = $row['body'];
     $date_added = $row['added_by'];
     $user_posted_to = $row['user_posted_to'];
     echo '
     <div class="posted_by">
       <a href='.@$added_by.'>'.@$added_by.'</a> - '.$date_added.' -
     </div>
     &nbsp;&nbsp;'.@$body.'<br><hr>';
   }
    ?>
    <?php
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
      } elseif (isset($_POST['unfriend'])) {
        // $username = logged in
        // $user = profile
        $isFriend = true;
        $query = $db->query("SELECT friend_array FROM users WHERE username='$username'");
        $get_friend_array_row = $query->fetch_assoc();
        $get_record = $get_friend_array_row['friend_array'];
        $get_exploded_records = explode(', ', $get_record);
        foreach ($get_exploded_records as $friend) {
          echo $friend;
        }
      }
      elseif (isset($_POST['cancelrequest'])) {
        $cancelrequest = $_POST['cancelrequest'];
        $cancelrequestquery = $db->query("DELETE FROM friend_requests WHERE user_from = '$username' AND user_to = '$user'");
      }
     ?>
 </div>
 <?php echo @$errorMsg;
  if (@$user != $username):
    ?>
   <form class="postForm" action="<?php echo $user; ?>" method="post">
     <?php
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
     $get_exploded_records = explode(', ', $get_record);
     $isFriend = false;
     foreach ($get_exploded_records as $friend) {
       if ($user == $friend) {
         $isFriend = true;
       } else {
         $isFriend = false;
       }
     }
     if ($isFriend) {
       echo '<input type="submit" class="btn btn-sm" name="unfriend" value="Unfriend">';
     } else {
       if ($isRequestSent) {
         echo '<input type="submit" class="btn btn-sm" name="cancelrequest" value="Cancel Request">';
       } else {
          echo '<input type="submit" class="btn btn-sm" name="addfriend" value="Add as a friend">';
       }
     }
     echo '<input type="submit" class="btn btn-sm" name="sendmsg" value="Send message">';
    echo "</form>";
    endif; ?>
 <div class="textHeader"><?php echo $user; ?>'s Profile</div>
 <div class="profileLeftSideContent">
 <?php
 $about_query = $db->query("SELECT bio FROM users WHERE username='$user'");
 $get_result = $about_query->fetch_assoc();
 $about_the_user = $get_result['bio'];
 echo $about_the_user;
 ?>
 </div>
 <?php
     $GetListOfFriends = $db->query("SELECT friend_array FROM users WHERE username = '$user'");
     $getRow = $GetListOfFriends->fetch_assoc();
     $friend_array = explode(', ', $getRow['friend_array']);
     $friendsCount = Count($getRow['friend_array']);
  ?>
 <div class="textHeader"><?php echo $user; ?>'s Friends <?php echo $friendsCount;?></div><br>
 <div class="profileLeftSideContent">
   <?php
    foreach ($friend_array as $friend) {
      $GetImage = $db->query("SELECT profile_pic FROM users WHERE username = '$friend'");
      $getRow = $GetImage->fetch_assoc();
      echo '<a href="'.$friend.'"><img src="userdata/profile_pic/'.$getRow['profile_pic'].'" alt="'.$friend.'" title="'.$friend.'" name="FriendPhoto" height="50" width="40"/></a>&nbsp;&nbsp';
    }
    ?>
 </div>
 <?php include './inc/footer.inc.php'; ?>
