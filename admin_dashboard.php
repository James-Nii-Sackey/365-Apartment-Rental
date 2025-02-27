<?php 
$title = 'Admin Dashboard';
include('templates/header.php');
$email = $_GET['name'];
echo "welcome " . $email;
?>