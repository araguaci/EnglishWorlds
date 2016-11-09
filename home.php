<?php
ob_start();
require_once './inc/header.inc.php';
$buffer = ob_get_contents();
ob_end_clean();
$buffer=str_replace("%TITLE%","Home Feed",$buffer);
echo $buffer;
require('./inc/westsworld.datetime.class.php');
require('./inc/timeago.inc.php');
 ?>
    <div class="container">
      <form id="postingForm" action="home.php" method="post">
        <textarea name="postText" class="input-medium" placeholder="Share your thoughts..."></textarea>
        <button class="btn" type="submit">Post</button>
      </form>
    </div>
     <?php
       $post = @$_POST['postText'];
       if ($post != "") {
       $date_added = date("Y-m-d");
       $time = date("hh:ii:ss", time());
       $added_by = $username;
       $sqlCommand = "INSERT INTO posts VALUES('', '$post', '$date_added', NOW(), '$added_by', NULL)";
       $query = $db->query($sqlCommand) or die(mysql_error());
       }
       $getposts = $db->query("SELECT * FROM posts WHERE added_by='$username' ORDER BY id DESC LIMIT 10") or die(mysql_errno());
       $getname = $db->query("SELECT first_name, last_name FROM users WHERE username='$username'");
       $readname = $getname->fetch_assoc();
       $first_name = $readname['first_name'];
       $last_name = $readname['last_name'];
       $current_time = date('Y/m/d H:i:s', time());
       while ($row = $getposts->fetch_assoc()) {
         $id = $row['id'];
         $body = $row['body'];
         $date_added = $row['date_added'];
         $time_added = $row['time'];
         $added_by = $row['added_by'];
         $user_posted_to = $row['user_posted_to'];
         $timeAgo = new TimeAgo();
         echo '<div class="posted_by" ><a href='."$added_by".'>'.capitalize($first_name).' '.capitalize($last_name).'</a></div>
         <span style="margin-left: 1em;">'.$timeAgo->inWords($time_added, $current_time).'</span>
         <br>
         '.$body.'
         <hr>';
     }
  include './inc/footer.inc.php';
 ?>
