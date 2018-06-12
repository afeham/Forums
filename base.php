<?php
session_start();

$dbhost = "localhost";
$dbname = "lolnah";
$dbuser = "lolnah";
$dbpass = "lolnah";

$websql = mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname, $websql) or die("MySQL Error: " . mysql_error());

?>
