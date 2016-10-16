<?php
mysql_connect("localhost", "root", "cicada3301") or die("Couldn't connect to SQL server");
mysql_select_db("english") or header("location: ./errors/no_db.html");
 ?>
