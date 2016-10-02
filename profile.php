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
        echo "<h2>User does not exist!</h2>";
        exit();
      }
    }
  }
 ?>
<h2>Profile page for: <?php echo "$username"; ?></h2>
<h2>First name: <?php echo "$firsname"; ?></h2>
