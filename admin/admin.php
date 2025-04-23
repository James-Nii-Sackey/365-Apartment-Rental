<?php
session_start();
require('../config/config.php');

// Redirect to login if not authenticated
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit();
}

// Admin credentials (in a real app, store these securely in a database)
$admin_username = 'admin';
$admin_password = 'password123'; // Change this to a strong password

// Database connection
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>