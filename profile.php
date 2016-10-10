<?php
  include './inc/header.inc.php';
  if (isset($_GET['u'])) {
    $username = mysql_real_escape_string($_GET['u']);
    if (ctype_alnum($username)) {
      // check user exists
      $check = mysql_query("SELECT username, first_name FROM users WHERE username='$username'");
      if (mysql_num_rows($check)===1 && $username != "about") {
        $get = mysql_fetch_assoc($check);
        $username = $get['username'];
        $first_name = $get['first_name'];
      } else {
        // If user doesn't exist then resirect to index
        echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/English/index.php\">";
        exit();
      }
    }
  } else {
    // Do Nothing
  }
  $post = @$_POST['post'];
  if ($post != "") {
  $date_added = date("Y-m-d");
  $added_by = $username;
  $user_posted_to = $username;
  $sqlCommand = "INSERT INTO posts VALUES('', '$post', '$date_added', '$added_by', '$user_posted_to')";
  $query = mysql_query($sqlCommand) or die(mysql_error());
  // Check whether the user has uploaded a profile pic or not
  $check_pic = mysql_query("SELECT profile_pic FROM users WHERE username = '$username'");
  $get_pic_row = mysql_fetch_assoc($check_pic);
  $profile_pic_db = $get_pic_row['profile_pic'];
  }
  if (@$profile_pic_db == "") {
    $profile_pic = "img/default-pp.jpg";
  } else {
    $profile_pic = "userdata/profile_pics/".$profile_pic_db;
  }
 ?>
 <div id="status">
 </div>
 <div class="postForm">
   <form action="<?php echo $username; ?>" method="post">
     <textarea id="post" name="post" rows="4" cols="58"></textarea>
     <input type="submit" name="send" value="Post" style="background-color: #DCE5EE; float: right; border: 1px solid #666; color:#666; height: 73px; width: 65px;"></div>
   </form>
 <div class="profilePosts">
   <?php
   $getposts = mysql_query("SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id DESC LIMIT 10") or die(mysql_errno());
   while ($row = mysql_fetch_assoc($getposts)) {
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
 </div>
 <img src="<?php echo $profile_pic; ?>" height="250" width="200" alt="<?php echo $username; ?>'s Profile" title="<?php echo $username; ?>'s Profile" />
 <br>
 <form action="<?php echo $username; ?>" method="post">
  <input type="submit" name="addfriend" value="Add as a friend">
  <input type="submit" name="sendmsg" value="Send message">
 </form>
 <div class="textHeader"><?php echo $username; ?>'s Profile</div>
 <div class="profileLeftSideContent">
 <?php
 $about_query = mysql_query("SELECT bio FROM users WHERE username='$username'");
 $get_result = mysql_fetch_assoc($about_query);
 $about_the_user = $get_result['bio'];
 echo $about_the_user;
 ?>
 </div>
 <div class="textHeader"><?php echo $username; ?>'s Friends</div>
 <div class="profileLeftSideContent">
  <img src="#" alt="" height="50" width="40"/>&nbsp;&nbsp;
  <img src="#" alt="" height="50" width="40"/>&nbsp;&nbsp;
  <img src="#" alt="" height="50" width="40"/>&nbsp;&nbsp;
  <img src="#" alt="" height="50" width="40"/>&nbsp;&nbsp;
  <img src="#" alt="" height="50" width="40"/>&nbsp;&nbsp;
  <img src="#" alt="" height="50" width="40"/>&nbsp;&nbsp;
  <img src="#" alt="" height="50" width="40"/>&nbsp;&nbsp;
  <img src="#" alt="" height="50" width="40"/>&nbsp;&nbsp;
  <img src="#" alt="" height="50" width="40"/>&nbsp;&nbsp;
 </div>
 <?php include './inc/footer.inc.php'; ?>
