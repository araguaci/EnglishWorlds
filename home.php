<?php
  ob_start();
  require_once './inc/header.inc.php';
  if (!$username) {
    LoginAlert();
  }
  $buffer = ob_get_contents();
  ob_end_clean();
  $buffer=str_replace("%TITLE%","Home Feed",$buffer);
  echo $buffer;
  require('./inc/westsworld.datetime.class.php');
  require('./inc/timeago.inc.php');
  $post = @$_POST['PostText'];
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
  ?>
    <center>
      <div class="container">
        <div class="NewsFeed">
          <h2>News Feed</h2>
        </div>
        <div id="PostTabs" style="width: 600px; height: 50px;">
          <ul class="nav nav-tabs">
            <li class="nav active"><a href="#Post" data-toggle="tab">Post</a></li>
            <li class="nav"><a href="#Photo" data-toggle="tab">Share Photo</a></li>
            <li class="nav"><a href="#Video" data-toggle="tab">Share Video</a></li>
            <li class="nav"><a href="#Poll" data-toggle="tab">Create Poll</a></li>
            <li class="nav"><a href="#Upload" data-toggle="tab">Upload File</a></li>
          </ul>
          <div class="tab-content">
              <div class="tab-pane fade in active" id="Post">
                <form action="home.php" method="post">
                  <input type="text" name="PostText" class="input-medium" placeholder="Share your thoughts">
                  <button class="btn btn-sm" type="submit">Post</button>
                </form>
              </div>
              <div class="tab-pane fade" id="Photo">There should be a photo posting form here</div>
              <div class="tab-pane fade" id="Video">There should be a video posting form here</div>
              <div class="tab-pane fade" id="Poll">There should be a poll posting form here</div>
              <div class="tab-pane fade" id="Upload">There should be a upload posting form here</div>
          </div>
        </div><br><br>
      <?php
      while ($row = $getposts->fetch_assoc()) {
        $id = $row['id'];
        $body = $row['body'];
        $date_added = $row['date_added'];
        $time_added = $row['time'];
        $added_by = $row['added_by'];
        $user_posted_to = $row['user_posted_to'];
        $timeAgo = new TimeAgo();
        echo '<div class="PostContainer"><div class="PostedBy" ><a href='."$added_by".'>'.capitalize($first_name).' '.capitalize($last_name).'</a></div>
        <span style="margin-left: 1em;">'.$timeAgo->inWords($time_added, $current_time).'</span>
        <br>
        '.$body.'<br><input type="text" name="comment" placeholder="Write a comment..."><hr></div>';
      }
     ?>
    </div>
  </center>
<?php include './inc/footer.inc.php'; ?>
