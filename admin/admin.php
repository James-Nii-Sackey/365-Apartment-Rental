<?php 
session_start();
 $title = 'Admin';
    include('../templates/header.php');
    include('../config/config.php');

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE admin_email = '$email' AND admin_password = '$password'";
    $result = mysqli_query($mysqli, $sql);
    if(mysqli_num_rows($result) > 0){
        $_SESSION['ADMIN_LOGIN'] = 'yes';
        $_SESSION['ADMIN_USERNAME'] = $email;
        header('location:admin_dashboard.php');
        die();
    }else{
        echo "Please enter valid login details";
    }
}
?>

    
<main class="form-signin w-25 m-auto card p-5">
  <form method="post" >
    <div class="d-flex justify-content-center">
        <img class="mb-4" src="../assets/img/fr.png"  alt="" width="82" height="67">
      

    </div>
    <h1 class="h4 mb-3  text-center">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control my-3" name="email" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <input class="btn btn-primary w-100 py-2" type="submit" name="submit" value="Sign in">
  
  </form>
</main>
