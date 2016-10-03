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
 <div class="postForm"><form action= "<?php echo $username; ?>" method="post">
   <textarea id="post" name="post" rows="4" cols="58"></textarea>
   <input type="submit" name="send" value="Post" style="background-color: #DCE5EE; float: right; border: 1px solid #666;">
 </form></div>
 <div class="profilePosts">Your Posts will go here ...</div>
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
