<?php
$str1 = "abc abc abc abc abc abc abc";
$str2 = "abc abc abc abc acb bca";
$data1 = preg_split('/\s+/', $str1);
$data2 = preg_split('/\s+/', $str2);
$x = 0;
for ($i=0; $i < count($data2); $i++) {
  if ($data1[$i] != $data2[$i]) {
    $x++;
  }
}
$y = 0;
if (count($data1) - count($data2) <= 0) {
  $y = count($data1) - count($data2);
}

echo $x + (); // Outputs 2
 ?>
