<?php 
$title = 'Apply';
require('config/config.php');
require_once('templates/header.php');

if(isset($_POST['proceed'])){
    // user selected location
    $location = $_POST['location'];
    // redirect to apply_form.php with location query string
    header('location:apply_form.php?location='.$location);
    die();
}
?>


<div class="container card my-5 p-4 shadow-lg">
    <div class="location-header text-center mb-4">
        <h2 class="text-primary">Please Select a Location</h2>
    </div>
    <form action="" method="post">
        <div class="row">
            <?php 
            $locations = [
                ["Two bedrooms 2 bath Apartment at 365 PLAZA at Mayera", "assets/img/1.jpg"], //$location 
                ["One Bedroom Self House at Okaiman-Mayera", "assets/img/2.jpg"],
                ["Two bedrooms Two bath Apartment at 365 Residence-Mayera", "assets/img/3.jpg"],
                ["Two bedrooms One bath Apartment at 365 Residence-Mayera", "assets/img/4.jpg"],
                ["Three bedrooms Three bath Apartment at 365 Residence-Mayera", "assets/img/4.jpg"],
                ["One bedroom One bath Apartment at 365 PLAZA at Mayera", "assets/img/5.jpg"]
            ];

            foreach ($locations as $location) {
                echo '
                <div class="col-md-6 mb-3">
                    <label class="d-flex align-items-center p-2 border rounded shadow-sm">
                        <input type="radio" required name="location" value="'.$location[0].'" class="me-2">
                        <img src="'.$location[1].'" alt="'.$location[0].'" class="img-thumbnail me-3" style="width: 100px; height: 100px; object-fit: cover;">
                        <span>'.$location[0].'</span>
                    </label>
                </div>';
            }
            ?>
            <div class="d-flex justify-content-center my-4">
        <input type="submit" class="btn btn-success w-25  form-control" value="proceed" name="proceed" id="">
        </div>
        </div>
    </form>
</div>


<?php  require_once('templates/footer.php'); ?>