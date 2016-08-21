<?php
session_start();

$dbhost = "localhost";
$dbname = "website";
$dbuser = "development";
$dbpass = "development";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysqli_select_db($connection, $dbname) or die("MySQL Error: " . mysql_error());
$base_url = 'http://localhost/user/register/';
?>