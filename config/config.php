<?php 
// Database configuration
$host = "localhost";
$user = "root";
$password = "";
$dbname = "365-apartment";
// create database connection
$mysqli = mysqli_connect($host, "root", $password, $dbname);    




// random number generator
$code =  rand(100000, 999999) . rand(100000, 999999);

?>
