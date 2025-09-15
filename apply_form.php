<?php 
$title = 'Application Form';
require('config/config.php');
require_once('templates/header.php');

// Get location from the URL query string and sanitize it
$location = isset($_GET['location']) ? htmlspecialchars($_GET['location']) : 'N/A';

// Generate a unique application code for this new application
$application_code = 'APP-' . strtoupper(uniqid());


// Check if the form was submitted
if(isset($_POST['submit'])){  
    // Sanitize and retrieve all form data
    $location_submitted = $_POST['location'];
    $app_code_submitted = $_POST['applicationCode'];
    // $rentDuration = $_POST['rentDuration'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $mobileNumber = $_POST['mobileNumber'];
    $email = $_POST['email'];
    $emergencyName = $_POST['emergencyName'];
    $emergencyContact = $_POST['emergencyContact'];
    $initialDeposit = (float)$_POST['initialDeposit']; // Corrected variable name
    $status = "Pending";

    // Use a prepared statement to prevent SQL injection
    $sql = "INSERT INTO applications (location, applicationCode, firstName, lastName, mobileNumber, email, emergencyName, emergencyContact, initalDeposit, status) VALUES (?, ?, ?,?, ?, ?, ?, ?, ?,?)";
    
    $stmt = mysqli_prepare($mysqli, $sql);

    // Bind parameters to the statement ('sssssssssd' represents the data types)
    mysqli_stmt_bind_param($stmt, "ssssssssds", $location_submitted, $app_code_submitted,  $firstName, $lastName, $mobileNumber, $email, $emergencyName, $emergencyContact, $initialDeposit,$status);
    
    // Execute the statement and check if it was successful
    if(mysqli_stmt_execute($stmt)){
        // Redirect user to the confirmation page with the unique application code
        header('location:confirmation.php?application_code='.$app_code_submitted );
        exit(); // Stop script execution
    } else {
        // Set an error message in the session to display to the user
        $_SESSION['error_message'] = "Failed to submit application. Please try again.";
    }
    mysqli_stmt_close($stmt);
}
?>

<div class="container my-5 w-50">
    <div class="card p-4 shadow-lg">
        <h2 class="text-center text-primary mb-4">Rent Application Form</h2>

        <?php 
        // Display an error message if one exists in the session
        if(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error_message']; ?>
                <?php unset($_SESSION['error_message']); // Clear the message after displaying it ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <!-- Hidden field to pass the unique application code -->
            <input type="hidden" name="applicationCode" value="<?= htmlspecialchars($application_code);?>">
            
            <!-- Selected Location (Read-only) -->
            <div class="mb-3">
                <label for="selectedLocation" class="form-label">Selected Location:</label>
                <input type="text" value="<?= $location;?>" class="form-control" id="selectedLocation" name="location" readonly>
            </div>

            <!-- Rent Package -->
            <div class="mb-3">
                <label for="rentPackage" class="form-label">Property Price:</label>
              <?php 
              $rentql = mysqli_query($mysqli, "SELECT  prop_price from properties");
              $data = mysqli_fetch_assoc($rentql);
              if($data > 0){
                foreach($data as $row)
                $rental_package = $row;
           ?>
              <input type="text" class="form-control" id="rentPackage" name="rentpackage" value="<?= $rental_package; ?>" readonly >
            </div>
            <?php
        }
        ?>
          
            <!-- Personal Details -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name" required>
                </div>
            </div>

            <!-- Contact Information -->
           
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
            </div>
           
            <div class="mb-3">
                <label for="phone" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="phone" name="mobileNumber" placeholder="Enter phone number" required>
            </div>

            <!-- Emergency Contact -->
            <div class="mb-3">
                <label for="emergencyName" class="form-label">Name of Emergency Contact</label>
                <input type="text" class="form-control" id="emergencyName" name="emergencyName" placeholder="Enter emergency contact name" required>
            </div>
            <div class="mb-3">
                <label for="emergencyContact" class="form-label">Emergency Contact Phone Number</label>
                <input type="tel" class="form-control" id="emergencyContact" name="emergencyContact" placeholder="Enter emergency contact number" required>
            </div>

            <!-- Tenant Initial Deposit -->
            <div class="mb-3">
                <label for="initialDeposit" class="form-label">Tenant Initial Deposit Agreement (GHC 500)</label>
                <input type="number" class="form-control" id="initialDeposit" name="initialDeposit" value="500" readonly>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <input type="submit" name="submit" class="btn btn-primary btn-lg w-100" value='Submit Application'>
            </div>
        </form>
    </div>
</div>

<?php  require_once('templates/footer.php'); ?>
