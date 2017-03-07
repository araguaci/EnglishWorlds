<?php
  ob_start();
  require_once '../inc/header.inc.php';
  $buffer=ob_get_contents();
  ob_end_clean();
  $buffer=str_replace("%TITLE%","About",$buffer);
  echo $buffer;
?>
    <div class="page-header">
      <h1>About I am Dz and I Speak English</h1>
    </div>
    <div class="jumbotron">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
<?php include '../inc/footer.inc.php'; ?>
