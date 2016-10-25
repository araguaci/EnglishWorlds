<?php
include './inc/header.inc.php';
 ?>
     <form id="postingForm" action="home.php" method="post">
       <textarea name="postText" rows="4" cols="40" placeholder="Share your thoughts..."></textarea>
       <input type="submit" class="btn btn-sm" name="post" value="Post">
     </form>
     <?php
       $getposts = mysql_query("SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id DESC LIMIT 10") or die(mysql_errno());
       while ($row = mysql_fetch_assoc($getposts)) {
         $id = $row['id'];
         $body = $row['body'];
         $date_added = $row['date_added'];
         $added_by = $row['added_by'];
         $user_posted_to = $row['user_posted_to'];
         echo '<div class="posted_by" ><a href='."$added_by".'>'.$added_by.'</a></div>
         <span style="margin-left: 1em;">'.$date_added.'</span>
         <br><hr>';
     }
      ?>
<?php
  include './inc/footer.inc.php';
 ?>
<span></span>
<a href="#"></a>
