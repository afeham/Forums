<?php
session_start();

$dbhost = "localhost";
$dbname = "mcvergec_dev";
$dbuser = "mcvergec_dev";
$dbpass = "saku1712";

$websql = mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname, $websql) or die("MySQL Error: " . mysql_error());

?>
