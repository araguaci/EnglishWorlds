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
        /*
          //$user = logged in user
          //$username = user who owns profile
          if (@$_POST['unfriend']) {
            //Friend array for logged in user
            $add_friend_check = mysql_query("SELECT friend_array FROM users WHERE username='$user'");
            $get_friend_row = mysql_fetch_assoc($add_friend_check);
            $friend_array = $get_friend_row['friend_array'];
            $friend_array_explode = explode(",",$friend_array);
            $friend_array_count = count($friend_array_explode);

            //Friend array for user who owns profile
            $add_friend_check_username = mysql_query("SELECT friend_array FROM users WHERE username='$username'");
            $get_friend_row_username = mysql_fetch_assoc($add_friend_check_username);
            $friend_array_username = $get_friend_row_username['friend_array'];
            $friend_array_explode_username = explode(",",$friend_array_username);
            $friend_array_count_username = count($friend_array_explode_username);

            $usernameComma = ",".$username;
            $usernameComma2 = $username.",";

            $userComma = ",".$user;
            $userComma2 = $user.",";

            if (strstr($friend_array,$usernameComma)) {
             $friend1 = str_replace("$usernameComma","",$friend_array);
            }
            else
            if (strstr($friend_array,$usernameComma2)) {
             $friend1 = str_replace("$usernameComma2","",$friend_array);
            }
            else
            if (strstr($friend_array,$username)) {
             $friend1 = str_replace("$username","",$friend_array);
            }
            //Remove logged in user from other persons array
            if (strstr($friend_array,$userComma)) {
             $friend2 = str_replace("$userComma","",$friend_array);
            }
            else
            if (strstr($friend_array,$userComma2)) {
             $friend2 = str_replace("$userComma2","",$friend_array);
            }
            else
            if (strstr($friend_array,$user)) {
             $friend2 = str_replace("$user","",$friend_array);
            }

            $friend2 = "";

            $removeFriendQuery = mysql_query("UPDATE users SET friend_array='$friend1' WHERE username='$user'");
            $removeFriendQuery_username = mysql_query("UPDATE users SET friend_array='$friend2' WHERE username='$username'");
            echo "Friend Removed ...";
            header("Location: $username");
          }

        */
      } elseif (isset($_POST['unfriend'])) {
        //Friend array for logged in user
        $add_friend_check = $db->query("SELECT friend_array FROM users WHERE username='$username'");
        $get_friend_row = $add_friend_check->fetch_assoc();
        $friend_array = $get_friend_row['friend_array'];
        $friend_array_explode = explode(",",$friend_array);
        print_r($friend_array_explode);

        $friend_array_count = count($friend_array_explode);

        //Friend array for user who owns profile
        $add_friend_check_user = $db->query("SELECT friend_array FROM users WHERE username='$user'");
        $get_friend_row_user = $add_friend_check_user->fetch_assoc();
        $friend_array_user = $get_friend_row_user['friend_array'];
        $friend_array_explode_user = explode(",",$friend_array_user);
        $friend_array_count_user = count($friend_array_explode_user);
        print_r($friend_array_explode_user);


        $usernameComma = ",".$username;
        $usernameComma2 = $username.",";

        $userComma = ",".$user;
        $userComma2 = $user.",";
        $friend1 = "";
        $friend2 = "";
        if (strstr($friend_array,$usernameComma)) {
         $friend1 = str_replace("$usernameComma","",$friend_array);
        }
        else
        if (strstr($friend_array,$usernameComma2)) {
         $friend1 = str_replace("$usernameComma2","",$friend_array);
        }
        else
        if (strstr($friend_array,$username)) {
         $friend1 = str_replace("$username","",$friend_array);
        }
        //Remove logged in user from other persons array
        if (strstr($friend_array,$userComma)) {
         $friend2 = str_replace("$userComma","",$friend_array);
        }
        else
        if (strstr($friend_array,$userComma2)) {
         $friend2 = str_replace("$userComma2","",$friend_array);
        }
        else
        if (strstr($friend_array,$user)) {
         $friend2 = str_replace("$user","",$friend_array);
        }

        /*
        $removeFriendQuery = $db->query("UPDATE users SET friend_array='$friend1' WHERE username='$user'");
        $removeFriendQuery_username = $db->query("UPDATE users SET friend_array='$friend2' WHERE username='$username'");
        */
        echo "Friend one is ".$friend1.'<br>'.'and Friend two is '.$friend2;
        echo "<br>Friend Removed";
        /*
        // $username = logged in
        // $user = profile
        $isFriend = true;
        $query = $db->query("SELECT friend_array FROM users WHERE username='$username'");
        $get_friend_array_row = $query->fetch_assoc();
        $get_record = $get_friend_array_row['friend_array'];
        $get_exploded_records = explode(', ', $get_record);
        list($first_record) = $get_exploded_records;
        foreach ($get_exploded_records as $friend) {
          // Query to delete the $user from friend array of $username and vice versa
          if ($friend == $user || $first_record == $user) {
            $new_array = array_splice($get_exploded_records, array_search($user, $get_exploded_records), 1);
            $poped_out = implode(', ', $get_exploded_records);
            echo $poped_out;
            $db->query("UPDATE users SET friend_array = '$poped_out' WHERE username = $username");
          }
        }
        */
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
     list($first_record) = $get_exploded_records;
     $isFriend = false;
     foreach ($get_exploded_records as $friend) {
       if ($user == $friend || $user == $first_record) {
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
     $friendsCount = Count($friend_array);
     if ($friend_array[0] == '') {
       $friendsCount = 0;
     }
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
