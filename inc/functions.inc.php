<?php
  function capitalize($word)
  {
    $pos = substr($word, 0, 1);
    $char = strtoupper($pos);
    return $char.substr($word, 1);
  }
 ?>
