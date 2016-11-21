<?php
  require_once './inc/header.inc.php';
  if (isset($_GET['u'])) {
  $user = mysqli_real_escape_string($db, $_GET['u']);
  $buffer=ob_get_contents();
  ob_end_clean();
  // TODO: fix this bug
  $buffer=str_replace("%TITLE%","Message $user",$buffer);
  echo $buffer;
  if (ctype_alnum($user)) {
    // check user exists
    $check = $db->query("SELECT username FROM users WHERE username='$user'");
    if ($check->num_rows===1 && $user != "about") {
      $get = $check->fetch_assoc();
      $theUserName = $get['username'];

      // Check user isn't sending themselves a private message
      if ($user != $username) {
        if (isset($_POST['submit'])) {
          $msg_body = strip_tags(@$_POST['msg_body']);
          $opened = "no";
          if ($msg_body == "Enter the message you wish to send ...") {
            echo "Please write a message.";
          } elseif (strlen($msg_body) < 3) {
            echo "Your message can not be less than three characters";
          } else {
            $send_msg = $db->query("INSERT INTO pvt_messages VALUES (NULL, '$username', '$user', '$msg_body', NOW(), '$opened')");
            echo "Your message has been sent...";
          }
        }
        echo '
        <form action="send_msg.php?u=$user" method="POST">
        <h2>Compose a Message: ('.$user.')</h2>
        <textarea cols="50" rows="12" name="msg_body">Enter the message you wish to send ...</textarea>
        <input type="submit" name="submit" value="Send Message">
        ';
      } else {
        redirect($username);
      }
    }
  }
}
 ?>
