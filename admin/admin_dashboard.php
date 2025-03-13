<?php 
session_start();
$title = 'Admin Dashboard';

$email = $_SESSION['ADMIN_USERNAME'];
// echo "welcome " . $email;
// log user out
if(isset($_POST['logout'])){
    $_SESSION['ADMIN_LOGIN'] = 'no';
    unset($_SESSION['ADMIN_USERNAME']);
    header('location:admin.php');
    die();
}
// log user out if they are not logged in
if($_SESSION['ADMIN_LOGIN'] != 'yes'){
    header('location:admin.php');
    die();
}
include('../templates/admin_header.php');
?>

<!-- <form action="" method="post">
    <input type="submit" name="logout" value="Logout">
</form> -->

<!-- <?php include('../templates/footer.php'); ?> -->