<?php
  ob_start();
  require_once './inc/header.inc.php';
  $buffer = ob_get_contents();
  ob_end_clean();
  $buffer=str_replace("%TITLE%","Pokes",$buffer);
  echo $buffer;
  if (!$username) {
    LoginAlert();
  }
  $check_for_pokes = $db->query("SELECT * FROM pokes WHERE user_to='$username'");
  $poke = $check_for_pokes->fetch_assoc();
  $hidden = "none";
  if ($check_for_pokes->num_rows != 0) {
    $user_to = $poke['user_to'];
    $user_from = $poke['user_from'];
    $hidden = "";
    echo "You have been poked by $user_from";
  } else {
    echo "Senpai didn't notice you";
  }
  if (isset($_POST['poke_'.$user_from.''])) {
    $db->query("UPDATE pokes SET user_to='$user_from', user_from='$username' WHERE user_to = '$username'");
  }
  include './inc/footer.inc.php';
 ?>
<form action="pokes.php" method="post" style="display: <?php echo $hidden; ?>">
  <input type="submit" class="btn btn-sm" name="poke_<?php echo $user_from; ?>" value="Poke Back">
</form>
