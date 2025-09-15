<?php 
$title = 'Confirmation';
require('config/config.php');
require_once('templates/header.php');

// get the application code from the query string
$application_code = $_GET['application_code'];

// check if the application code is set
if(isset($application_code)){
// select the application details from the database
    $sql = "SELECT * FROM applications WHERE applicationCode = '$application_code'";
    // result query basically have 2 parameters, the connection and the sql query
    $result = mysqli_query($mysqli, $sql);
    // fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);

    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $mobileNumber = $row['mobileNumber'];
    $email = $row['email'];
    
    $emergencyName = $row['emergencyName'];
    $emergencyPhone = $row['emergencyContact'];
    $deposit = $row['initalDeposit'];
}
?>



<div class="container my-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center text-success mb-4">🎉 Application Confirmed!</h2>
        <p class="text-center">Thank you for booking with us, <strong><?php echo htmlspecialchars($firstName); ?>!</strong> Your details are below.</p>

        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Full Name</th>
                        <td><?php echo htmlspecialchars($firstName . ' ' . $lastName); ?></td>
                    </tr>
                    <tr>
                        <th>Mobile Number</th>
                        <td><?php echo htmlspecialchars($mobileNumber); ?></td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td><?php echo htmlspecialchars($email); ?></td>
                    </tr>
                    <tr>
                        <th>Rent Package</th>
                        <td><?php echo htmlspecialchars($rentPackage); ?></td>
                    </tr>
                    <tr>
                        <th>Emergency Contact Name</th>
                        <td><?php echo htmlspecialchars($emergencyName); ?></td>
                    </tr>
                    <tr>
                        <th>Emergency Contact Phone</th>
                        <td><?php echo htmlspecialchars($emergencyPhone); ?></td>
                    </tr>
                    <tr>
                        <th>Deposit Paid</th>
                        <td>GHC <?php echo htmlspecialchars($deposit); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary">🏠 Back to Home</a>
            <button onclick="window.print()" class="btn btn-secondary">🖨 Print Confirmation</button>
        </div>
    </div>
</div>


<?php require_once('templates/footer.php'); ?>