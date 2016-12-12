<?php
  ob_start();
  require_once './inc/header.inc.php';
  if (isset($_SESSION["username"])) {
    header("location: home.php");
  }
  $buffer = ob_get_contents();
  ob_end_clean();
  $buffer=str_replace("%TITLE%","Login",$buffer);
  echo $buffer;
 ?>
 <div class="container">
   <h2 align="center">Please enter your credentials</h2>
   <div id="box">
     <form method="POST">
       <div class="form-group">
         <label for="username">Username:</label>
         <input type="text" name="username" class="form-control" id="username" placeholder="Username">
       </div>
       <div class="form-group">
         <label for="password">Password:</label>
         <input type="password" name="password" class="form-control" id="password" placeholder="Password">
       </div>
       <div class="form-group">
         <input type="button" name="login" id="login" class="btn btn-success" value="Login">
       </div>
       <div id="error"></div>
     </form>
   </div>
 </div>
<?php
  if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = mysqli_real_escape_string($db, $_POST["username"]);
    $password = mysqli_real_escape_string($db, $_POST["password"]);
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '".password_verify($password)."'";
    $result = mysqli_query($db, $sql);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
      $data = mysqli_fetch_array($result);
      $_SESSION["username"] = $data["username"];
      echo $data["data"];
    }
  }
  include './inc/footer.inc.php';
 ?>