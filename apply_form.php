<?php 
$title = 'Application Form';
require('config/config.php');
require_once('templates/header.php');
// get location from query string
$location = $_GET['location'];


if(isset($_POST['submit'])){  // check if form is submitted and actually clicked
    $location = $_POST['location'];
    $application_code = $_POST['applicationCode'];
    $rentDuration = $_POST['rentDuration'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $mobileNumber = $_POST['mobileNumber'];
    $email = $_POST['email'];
    $emergencyName = $_POST['emergencyName'];
    $emergencyContact = $_POST['emergencyContact'];
    $initalDeposit = $_POST['initalDeposit'];

    // insert the user application details into the database
    $sql = "INSERT INTO applications (location,applicationCode, rentDuration, firstName, lastName, mobileNumber, email, emergencyName, emergencyContact, initalDeposit) VALUES ('$location', '$application_code ', '$rentDuration', '$firstName', '$lastName', '$mobileNumber', '$email', '$emergencyName', '$emergencyContact', '$initalDeposit')";
    // result query basically have 2 parameters, the connection and the sql query
    $result = mysqli_query($mysqli, $sql);
    // check if the query was successful
    if($result){
        // redirect user to the confirmation page with the uniqye application code in thr query string
        header('location:confirmation.php?application_code='.$application_code.' ');
    }else{
        echo "<script>alert('Failed to submit application')</script>";
    }
}
?>

<div class="container my-5 w-50">
    <div class="card p-4 shadow-lg">
        <h2 class="text-center text-primary mb-4">Rent Application Form</h2>
        <form method="post">

    <input type="hidden" name="applicationCode" value="<?= $code;?>" id="">
            <!-- selected location -->
        <div class="mb-3">
                <label for="selectedLocation" class="form-label">Selected Location:</label>
                <input type="text" value="<?php echo $location;?>" class="form-control" id="selectedLocation" name="location" readonly>
            </div>

            <!-- Rent Package -->
            <div class="mb-3">
                <label for="rentPackage" class="form-label">Rent Package Duration:</label>
                <select id="rentPackage" name="rentDuration" class="form-select" required>
                    <option value="3 months for GHC 1200">3 months for GHC 1200</option>
                    <option value="6 months for GHC 2400">6 months for GHC 2400</option>
                    <option value="12 months for GHC 4800">12 months for GHC 4800</option>
                </select>
            </div>

            <!-- First Name -->
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name" required>
            </div>

            <!-- Last Name -->
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name" required>
            </div>

            <!-- Mobile Number -->
            <div class="mb-3">
                <label for="mobileNumber" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" placeholder="Enter mobile number" required>
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
            </div>

            <!-- Emergency Contact Name -->
            <div class="mb-3">
                <label for="emergencyName" class="form-label">Name of Emergency Contact</label>
                <input type="text" class="form-control" id="emergencyName" name="emergencyName" placeholder="Enter emergency contact name" required>
            </div>

            <!-- Emergency Contact Phone Number -->
            <div class="mb-3">
                <label for="emergencyPhone" class="form-label">Emergency Contact Phone Number</label>
                <input type="text" class="form-control" id="emergencyPhone" name="emergencyContact" placeholder="Enter emergency contact number" required>
            </div>

            <!-- Tenant Initial Deposit -->
            <div class="mb-3">
                <label for="agreement" class="form-label">Tenant Initial Deposit Agreement (GHC 500)</label>
                <input type="number" class="form-control" id="agreement" name="initalDeposit" value="500" readonly>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <input type="submit" name="submit" class="btn btn-primary btn-lg w-100"value='Submit'>
            </div>
        </form>
    </div>
</div>


<?php  require_once('templates/footer.php'); ?>