<?php
  ob_start();
  require_once './inc/header.inc.php';
  $buffer = ob_get_contents();
  ob_end_clean();
  $buffer=str_replace("%TITLE%","Messages",$buffer);
  echo $buffer;
  if (!$username) {
    echo '<div class="alert alert-danger" role="alert">You must be logged in to view this page nigga!!</div>';
    die();
  }
  echo "<h2>My unread messages:</h2>";
  // Grab the messages from the logged in user
  $grab_messages = $db->query("SELECT * FROM pvt_messages WHERE user_to = '$username' AND opened = 'no'");
  if ($grab_messages->num_rows) {
    while ($get_msgs = $grab_messages->fetch_assoc()) {
      $id = $get_msgs['id'];
      $user_from = $get_msgs['user_from'];
      $user_to = $get_msgs['user_to'];
      $msg_title = $get_msgs['msg_title'];
      $msg_body = $get_msgs['msg_body'];
      $date = $get_msgs['date'];
      $opened = $get_msgs['opened'];
      if (strlen($msg_title) > 50) {
        echo substr($msg_title, 0, 50).' ....';
      }
      if (strlen($msg_body) > 150) {
        echo substr($msg_body, 0, 150).' ....';
      } else {
        $msg_body = $msg_body;

        if (@$_POST['setopened_'.$id.'']) {
          // Update the private messages table.
          $setopened_query = $db->query("UPDATE pvt_messages SET opened='yes' WHERE msg_title='$msg_title'");
        }

        echo '
        <form action="my_messages.php" name="'.$msg_title.'" method="POST">
          <b><a href="'.$user_from.'">'.$user_from.'</a></b>
          <input type="button" name="openmsg" value="'.$msg_title.'" onclick="javascript:toggle()">
          <input type="submit" name="setopened_'.$id.'" value="I\'ve read this">
        </form>
        <div id="toggleText'.$id.'" style="display: none;">
        '.$msg_body.'
        </div><hr><br>
        ';
      }
    }
    // <br><a id="displayText" href="javascript:toggle();">'.$msg_title.'</a><br>
  } else {
    echo "You don't have any new messages";
  }

  echo "<h2>My read messages:</h2>";
  // Grab the messages from the logged in user
  $grab_messages = $db->query("SELECT * FROM pvt_messages WHERE user_to = '$username' AND opened = 'yes'");
  if ($grab_messages->num_rows) {
    while ($get_msgs = $grab_messages->fetch_assoc()) {
      $id = $get_msgs['id'];
      $user_from = $get_msgs['user_from'];
      $user_to = $get_msgs['user_to'];
      $msg_title = $get_msgs['msg_title'];
      $msg_body = $get_msgs['msg_body'];
      $date = $get_msgs['date'];
      $opened = $get_msgs['opened'];
      if (strlen($msg_body) > 150) {
        echo substr($msg_body, 0, 150).' ....';
      } else {
        $msg_body = $msg_body;
        echo '<form action="my_messages.php" name="'.$msg_title.'" method="POST">
          <b><a href="'.$user_from.'">'.$user_from.'</a></b>
          <input type="button" name="openmsg" value="'.$msg_title.'" onclick="javascript:toggle()">
          <input type="submit" name="DeleteMessage" value="X" title="Delete message">
        </form>
        <div id="id">'.$id.'</div>
        <div id="toggleText'.$id.'" style="display: none;">
        '.$msg_body.'
        </div><hr><br>
        ';
      }
    }
  } else {
    echo "You haven't read any messages yet";
  }
 ?>
