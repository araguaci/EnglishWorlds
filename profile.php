<?php include './inc/header.inc.php';
  if (isset($_GET['u'])) {
    $username = mysql_real_escape_string($_GET['u']);
    if (ctype_alnum($username)) {
      // check user exists
      $check = mysql_query("SELECT username, first_name FROM users WHERE username='$username'");
      if (mysql_num_rows($check)===1) {
        $get = mysql_fetch_assoc($check);
        $username = $get['username'];
        $first_name = $get['first_name'];
      } else {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/English/index.php\">";
        exit();
      }
    }
  }
 ?>
 <div class="postForm">
   <textarea id="post" name="post" rows="4" cols="58"></textarea>
   <input type="submit" name="send" onclick="javascript:send_post()" value="Post" style="background-color: #DCE5EE; float: right; border: 1px solid #666; color:#666; height: 73px; width: 65px;"></div>
 <div class="profilePosts">
   <?php
   $getposts = mysql_query("SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id DESC LIMIT 10") or die(mysql_errno());
   while ($row = mysql_fetch_assoc($getposts)) {
     $id = $row['id'];
     $body = $row['body'];
     $date_added = $row['added_by'];
     $user_posted_to = $row['user_posted_to'];
     echo "
     <div class="posted_by">
       <a href='$added_by'>$added_by</a> - $date_added -
     </div>
     &nbsp;&nbsp;$body<br><hr>";
   }
    ?>

 </div>
 <img src="" height="250" width="200" alt="<?php echo $username; ?>'s Profile" title="<?php echo $username; ?>'s Profile" />
<br>
<div class="textHeader"><?php echo $username; ?>'s Profile</div>
<div class="profileLeftSideContent">Some content about this persons profile ...</div>
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
<?php include './inc/footer.inc.php' ?>
