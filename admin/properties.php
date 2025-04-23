<?php
require('../config/config.php');
$title = 'Manage Properties';

// Handle property updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_property'])) {
        $name = $_POST['name'];
        $image = $_POST['image'];
        $description = $_POST['description'];
        
        // In a real app, you would upload the image file properly
        $stmt = $mysqli->prepare("INSERT INTO properties (name, image, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $image, $description);
        $stmt->execute();
        $stmt->close();
        
        $_SESSION['message'] = "Property added successfully";
        header("Location: properties.php");
        exit();
    }
}

// Get all properties
$properties = [
    ["Two bedrooms 2 bath Apartment at 365 PLAZA at Mayera", "assets/img/1.jpg"],
    ["One Bedroom Self House at Okaiman-Mayera", "assets/img/2.jpg"],
    ["Two bedrooms Two bath Apartment at 365 Residence-Mayera", "assets/img/3.jpg"],
    ["Two bedrooms One bath Apartment at 365 Residence-Mayera", "assets/img/4.jpg"],
    ["Three bedrooms Three bath Apartment at 365 Residence-Mayera", "assets/img/4.jpg"],
    ["One bedroom One bath Apartment at 365 PLAZA at Mayera", "assets/img/5.jpg"]
];
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
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Manage Properties</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPropertyModal">
                        <i class="bi bi-plus"></i> Add Property
                    </button>
                </div>
                
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-success"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
                <?php endif; ?>
                
                <div class="row">
                    <?php foreach ($properties as $property): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="../<?php echo $property[1]; ?>" class="card-img-top" alt="<?php echo $property[0]; ?>" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $property[0]; ?></h5>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="#" class="btn btn-sm btn-primary me-2">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </main>
        </div>
    </div>

    <!-- Add Property Modal -->
    <div class="modal fade" id="addPropertyModal" tabindex="-1" aria-labelledby="addPropertyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPropertyModalLabel">Add New Property</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="propertyName" class="form-label">Property Name</label>
                            <input type="text" class="form-control" id="propertyName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="propertyImage" class="form-label">Image URL</label>
                            <input type="text" class="form-control" id="propertyImage" name="image" required>
                            <small class="text-muted">Example: assets/img/property1.jpg</small>
                        </div>
                        <div class="mb-3">
                            <label for="propertyDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="propertyDescription" name="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_property" class="btn btn-primary">Save Property</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>