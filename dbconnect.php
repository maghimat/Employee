<?php
//entry point for databse
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','employee');
$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
?>
