<?php
include './inc/header.inc.php';
 ?>
    <div class="container">
      <form id="postingForm" action="home.php" method="post">
        <textarea name="postText" rows="4" cols="40" placeholder="Share your thoughts..."></textarea>
        <input type="submit" class="btn btn-sm" name="post" value="Post">
      </form>
    </div>
     <?php
       $post = @$_POST['postText'];
       if ($post != "") {
       $date_added = date("Y-m-d");
       $added_by = $username;
       $sqlCommand = "INSERT INTO posts VALUES('', '$post', '$date_added', '$added_by', NULL)";
       $query = mysql_query($sqlCommand) or die(mysql_error());
       }
       $getposts = mysql_query("SELECT * FROM posts WHERE added_by='$username' ORDER BY id DESC LIMIT 10") or die(mysql_errno());
       while ($row = mysql_fetch_assoc($getposts)) {
         $id = $row['id'];
         $body = $row['body'];
         $date_added = $row['date_added'];
         $added_by = $row['added_by'];
         $user_posted_to = $row['user_posted_to'];
         echo '<div class="posted_by" ><a href='."$added_by".'>'.$added_by.'</a></div>
         <span style="margin-left: 1em;">'.$date_added.'</span>
         <br>
         '.$body.'
         <hr>';
     }
      ?>
<?php
  include './inc/footer.inc.php';
 ?>
