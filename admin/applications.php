<?php
require('../config/config.php');
$title = 'Manage Applications';

// Handle status updates
if (isset($_POST['update_status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    
    $stmt = $mysqli->prepare("UPDATE applications SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    $stmt->close();
    
    $_SESSION['message'] = "Application status updated successfully";
    header("Location: applications.php");
    exit();
}

// View single application
if (isset($_GET['view'])) {
    $id = $_GET['view'];
    $result = $mysqli->query("SELECT * FROM applications WHERE id = $id");
    $application = $result->fetch_assoc();
}

// Get all applications
$query = "SELECT * FROM applications ORDER BY id DESC";
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <?php include('../config/config.php'); ?>
    
    <div class="container-fluid">
        <div class="row">
            
       <?php include('templates/sidebar.php'); // Include sidebar ?>
            
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <h1 class="h2">Rental Applications</h1>
                
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-success"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
                <?php endif; ?>
                
                <?php if (isset($_GET['view'])): ?>
                    <!-- View Single Application -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>Application Details</h5>
                            <a href="applications.php" class="btn btn-sm btn-secondary">Back to list</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Application Code:</strong> <?php echo $application['applicationCode']; ?></p>
                                    <p><strong>Name:</strong> <?php echo $application['firstName'] . ' ' . $application['lastName']; ?></p>
                                    <p><strong>Email:</strong> <?php echo $application['email']; ?></p>
                                    <p><strong>Phone:</strong> <?php echo $application['mobileNumber']; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Property:</strong> <?php echo $application['location']; ?></p>
                                    <p><strong>Rent Package:</strong> <?php echo $application['rentDuration']; ?></p>
                                    <p><strong>Emergency Contact:</strong> <?php echo $application['emergencyName'] . ' (' . $application['emergencyContact'] . ')'; ?></p>
                                    <p><strong>Initial Deposit:</strong> GHC <?php echo $application['initalDeposit']; ?></p>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $application['id']; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Update Status</label>
                                            <select name="status" class="form-select">
                                                <option value="Pending" <?php echo ($application['status'] ?? 'Pending') === 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                                <option value="Approved" <?php echo ($application['status'] ?? 'Pending') === 'Approved' ? 'selected' : ''; ?>>Approved</option>
                                                <option value="Rejected" <?php echo ($application['status'] ?? 'Pending') === 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
                                                <option value="Completed" <?php echo ($application['status'] ?? 'Pending') === 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-end">
                                        <button type="submit" name="update_status" class="btn btn-primary">Update Status</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Applications List -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Property</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo htmlspecialchars($row['firstName'] . ' ' . $row['lastName']); ?></td>
                                            <td><?php echo htmlspecialchars(substr($row['location'], 0, 30) . '...'); ?></td>
                                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                                            <td><?php echo htmlspecialchars($row['mobileNumber']); ?></td>
                                            <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                                            <td>
                                                <?php 
                                                $status = $row['status'] ?? 'Pending';
                                                $badgeClass = [
                                                    'Pending' => 'bg-warning',
                                                    'Approved' => 'bg-success',
                                                    'Rejected' => 'bg-danger',
                                                    'Completed' => 'bg-primary'
                                                ][$status];
                                                ?>
                                                <span class="badge <?php echo $badgeClass; ?>"><?php echo $status; ?></span>
                                            </td>
                                            <td>
                                                <a href="applications.php?view=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">View</a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>