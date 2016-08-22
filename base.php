<?php
session_start();

$dbhost = "localhost";
$dbname = "website";
$dbuser = "development";
$dbpass = "development";

$websql = mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname, $websql) or die("MySQL Error: " . mysql_error());

?>