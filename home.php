<?php
include './inc/header.inc.php';
 ?>
     <form id="postingForm" action="home.php" method="post">
       <textarea name="postText" rows="4" cols="40" placeholder="Share your thoughts..."></textarea>
       <br>
       <input type="submit" class="btn btn-sm" name="post" value="Post">
     </form>
<?php
  include './inc/footer.inc.php';
 ?>
