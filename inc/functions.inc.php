<?php
  function Select($table, $column) {
    include 'connect.inc.php';
    $query = $db->query("SELECT * FROM $table");
    $result = $query->fetch_assoc();
    return $result[$column];
  }
  function capitalize($word) {
    $pos = substr($word, 0, 1);
    $char = strtoupper($pos);
    return $char.substr($word, 1);
  }
  function ago($time) {
     $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
     $lengths = array("60","60","24","7","4.35","12","10");

     $now = time();
     $difference = $now - $time;

     for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
         $difference /= $lengths[$j];
     }

     $difference = round($difference);

     if($difference != 1) {
         $periods[$j].= "s";
     }

     return "$difference $periods[$j] ago ";
  }
  function redirect($page) {
      echo '<script type="text/javascript">
      window.location = "'.$page.'";
    </script>';
  }
 ?>
