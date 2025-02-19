<?php 
// Database configuration
$host = "localhost";
$user = "root";
$password = "";
$dbname = "365-apartment";
// create database connection
$mysqli = mysqli_connect($host, "root", $password, $dbname);    

//verify the connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}{
    echo "Connected successfully";
}

?>