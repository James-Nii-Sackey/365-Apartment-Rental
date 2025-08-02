<?php 
$title = 'Apply';
// Note: You must have a 'config/config.php' file that establishes a $mysqli connection.
require('config/config.php');
require_once('templates/header.php');

// Handle form submission
if(isset($_POST['proceed'])){
    // Get the selected location from the form
    $location = $_POST['location'];
    // Redirect to the application form, passing the location as a URL parameter
    header('location:apply_form.php?location='.$location);
    die(); // Stop script execution after redirect
}

// Fetch all properties from the database to display as options
$result = mysqli_query($mysqli, "SELECT prod_location, prop_img FROM properties ORDER BY id DESC");
$properties = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="container card my-5 p-4 shadow-lg">
    <div class="location-header text-center mb-4">
        <h2 class="text-primary">Please Select a Location to Apply For</h2>
    </div>
    <form action="" method="post">
        <div class="row">
            <?php 
            // Check if any properties were found
            if (!empty($properties)):
                // Loop through each property fetched from the database
                foreach ($properties as $property) {
                    // Sanitize output to prevent XSS
                    $location_safe = htmlspecialchars($property['prod_location']);
                    $image_safe = htmlspecialchars($property['prop_img']);

                    echo '
                    <div class="col-md-6 mb-3">
                        <label class="d-flex align-items-center p-2 border rounded shadow-sm h-100">
                            <input type="radio" required name="location" value="'.$location_safe.'" class="me-2">
                            <img src="admin/uploads/'.$image_safe.'" alt="'.$location_safe.'" class="img-thumbnail me-3" style="width: 100px; height: 100px; object-fit: cover;" onerror="this.onerror=null;this.src=\'https://placehold.co/100x100/ccc/fff?text=No+Image\';">
                            <span>'.$location_safe.'</span>
                        </label>
                    </div>';
                }
            else:
                // Display a message if no properties are in the database
                echo '<p class="text-center">No properties are available at this time.</p>';
            endif;
            ?>
            <div class="d-flex justify-content-center my-4">
                <input type="submit" class="btn btn-success w-25 form-control" value="Proceed" name="proceed">
            </div>
        </div>
    </form>
</div>


<?php  require_once('templates/footer.php'); ?>
