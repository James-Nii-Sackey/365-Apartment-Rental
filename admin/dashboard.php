<?php
require('../config/config.php');
$title = 'Admin Dashboard';
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
    <div class="container-fluid">
        <div class="row">
            <?php include('templates/sidebar.php'); // Include sidebar ?>
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <h1 class="h2">Dashboard</h1>
                
                <div class="row my-4">
                    <!-- Applications Card -->
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <?php
                                $result = $mysqli->query("SELECT COUNT(*) as total FROM applications");
                                $row = $result->fetch_assoc();
                                ?>
                                <h5 class="card-title">Total Applications</h5>
                                <h2 class="card-text"><?php echo $row['total']; ?></h2>
                                <a href="applications.php" class="text-white">View all</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Properties Card -->
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Properties</h5>
                                <h2 class="card-text">6</h2>
                                <a href="properties.php" class="text-white">Manage properties</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Messages Card -->
                    <div class="col-md-4">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body">
                                <?php
                                $result = $mysqli->query("SELECT COUNT(*) as total FROM clients");
                                $row = $result->fetch_assoc();
                                ?>
                                <h5 class="card-title">Messages</h5>
                                <h2 class="card-text"><?php echo $row['total']; ?></h2>
                                <a href="messages.php" class="text-white">View messages</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Applications -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Recent Applications</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Property</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = $mysqli->query("SELECT * FROM applications ORDER BY id DESC LIMIT 5");
                                    while ($row = $result->fetch_assoc()):
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo htmlspecialchars($row['firstName'] . ' ' . $row['lastName']); ?></td>
                                        <td><?php echo htmlspecialchars(substr($row['location'], 0, 30) . '...'); ?></td>
                                        <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                                        <td><span class="badge bg-warning">Pending</span></td>
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
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>