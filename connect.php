<?php 

$sname = "localhost";
$suser = "root";
$spass = "root";
$dbname = "role_db";

$conn = mysqli_connect($sname, $suser, $spass, $dbname);

if (!$conn) {
 	echo "Faild to connect!";
 	exit();
 } 