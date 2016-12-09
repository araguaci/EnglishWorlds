<?php
$options = [
  'cost' => 11 // TODO: Change this number and add a salt for production
];
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="test.php" method="post">
      Hash this: <br><input type="text" name="psw" placeholder="Password To hash"><br>
      <input type="submit" name="submit" value="Submit">
    </form>
    The hashed is <br><h1><?php echo password_hash($_POST['psw'], PASSWORD_BCRYPT, $options); ?></h1>
    <form class="" action="test.php" method="post">
      Verify this password: <br><input type="text" name="verify" placeholder="Pass to verify"><br>
      With this hash: <br><input type="text" name="hash" placeholder="Hash to verify with"><br>
      <input type="submit" name="submit" value="Submit">
    </form>
    The result is: <br><h1><?php
    if (password_verify($_POST['verify'], $_POST['hash'])) {
      echo "Halaluja";
    } else {
      echo "Boooo !!! it's not working";
    }
    ?></h1>
  </body>
</html>
