<?php
// Load config & start session immediately
// Note: You must have a 'config/config.php' file that establishes a $mysqli connection.
 require('../config/config.php'); 
session_start();


// Page title
$title = 'Manage Properties';

/**
 * Handles image upload and returns the path to the saved file.
 *
 * @param string $fileInputName The 'name' attribute of the file input.
 * @return string|null The path to the uploaded file or null on failure.
 */
function handleImageUpload($fileInputName) {
    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }
        $fileName = uniqid() . '-' . basename($_FILES[$fileInputName]['name']);
        $targetPath = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetPath)) {
            return $targetPath;
        }
    }
    return null;
}

// Handle POST requests for adding or editing properties
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $location  = $_POST['location'];
    $room_type = $_POST['room_type'];
    $bath      = (int)$_POST['bath'];
    $price     = (float)$_POST['price'];

    // ADD NEW PROPERTY
    if (isset($_POST['add_property'])) {
        $imagePath = handleImageUpload('image');
        if ($imagePath) {
            $stmt = mysqli_prepare($mysqli, "INSERT INTO properties (prod_location, prop_room_type, prop_bath, prop_price, prop_img) VALUES (?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "ssids", $location, $room_type, $bath, $price, $imagePath);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            $_SESSION['message'] = "Property added successfully.";
        } else {
            $_SESSION['message'] = "Property could not be added. Image upload failed.";
        }
        header("Location: properties.php");
        exit;
    }

    // EDIT EXISTING PROPERTY
    if (isset($_POST['edit_property'])) {
        $id = (int)$_POST['id'];
        $imagePath = $_POST['existing_image']; 

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $newImagePath = handleImageUpload('image');
            if ($newImagePath) {
                if (!empty($imagePath) && file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $imagePath = $newImagePath;
            }
        }
        
        $stmt = mysqli_prepare($mysqli, "UPDATE properties SET prod_location = ?, prop_room_type = ?, prop_bath = ?, prop_price = ?, prop_img = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "ssidsi", $location, $room_type, $bath, $price, $imagePath, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $_SESSION['message'] = "Property updated successfully";
        header("Location: properties.php");
        exit;
    }
}

// Handle GET request for deleting a property
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    
    $stmt = mysqli_prepare($mysqli, "SELECT prop_img FROM properties WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $property = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if ($property && !empty($property['prop_img']) && file_exists($property['prop_img'])) {
        unlink($property['prop_img']);
    }

    $stmt = mysqli_prepare($mysqli, "DELETE FROM properties WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['message'] = "Property deleted successfully";
    header("Location: properties.php");
    exit;
}

// Fetch all properties from the database to display
$result = mysqli_query($mysqli, "SELECT * FROM properties ORDER BY id DESC");
$properties = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= htmlspecialchars($title) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; }
    .sidebar { position: fixed; top: 0; bottom: 0; left: 0; z-index: 100; padding: 48px 0 0; box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1); }
    .sidebar-sticky { position: relative; top: 0; height: calc(100vh - 48px); padding-top: .5rem; overflow-x: hidden; overflow-y: auto; }
    .nav-link { font-weight: 500; color: #333; }
    .nav-link.active { color: #007bff; }
    .card-modern { border: none; border-radius: .75rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: transform .2s ease-in-out, box-shadow .2s ease-in-out; background-color: #fff; }
    .card-modern:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,0.12); }
    .badge-room { background-color: #6c757d; }
  </style>
</head>
<body>
  
  <div class="container-fluid">
    <div class="row">
    <?php include('templates/sidebar.php'); // Include sidebar ?>

      <!-- Main Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
          <h1 class="h2"><?= htmlspecialchars($title) ?></h1>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPropertyModal"><i class="bi bi-plus-lg me-1"></i> Add Property</button>
        </div>

        <?php if (!empty($_SESSION['message'])): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']; unset($_SESSION['message']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <div class="row">
          <?php if (empty($properties)): ?>
            <p>No properties found. Click "Add Property" to get started.</p>
          <?php else: ?>
            <?php foreach ($properties as $p): ?>
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card card-modern h-100">
                  <img src="<?= htmlspecialchars($p['prop_img']) ?>" class="card-img-top rounded-top" style="height: 220px; object-fit: cover;" alt="Image of <?= htmlspecialchars($p['prod_location']) ?>" onerror="this.onerror=null;this.src='https://placehold.co/600x400/ccc/fff?text=Image+Not+Found';">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= htmlspecialchars($p['prod_location']) ?></h5>
                    <div class="mb-2">
                      <span class="badge badge-room me-1"><?= htmlspecialchars($p['prop_room_type']) ?></span>
                      <span class="badge badge-room"><?= $p['prop_bath'] ?> Bath</span>
                    </div>
                    <h4 class="fw-bold mt-auto mb-0">GHC <?= number_format($p['prop_price'], 2) ?></h4>
                  </div>
                  <div class="card-footer bg-transparent border-0 d-flex justify-content-end pb-3">
                    <button class="btn btn-sm btn-outline-secondary me-2" data-bs-toggle="modal" data-bs-target="#editPropertyModal<?= $p['id'] ?>">Edit</button>
                    <a href="?delete=<?= $p['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this property?');">Delete</a>
                  </div>
                </div>
              </div>

              <!-- Edit Property Modal -->
              <div class="modal fade" id="editPropertyModal<?= $p['id'] ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="POST" enctype="multipart/form-data">
                      <div class="modal-header"><h5 class="modal-title">Edit Property</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                      <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $p['id'] ?>">
                        <input type="hidden" name="existing_image" value="<?= htmlspecialchars($p['prop_img']) ?>">
                        <div class="mb-3"><label class="form-label">Location</label><input type="text" name="location" class="form-control" value="<?= htmlspecialchars($p['prod_location']) ?>" required></div>
                        <div class="mb-3"><label class="form-label">Room Type</label><select name="room_type" class="form-select" required><?php foreach (['1-bedroom','2-bedroom','3-bedroom','4-bedroom'] as $rt): ?><option value="<?= $rt ?>" <?= $p['prop_room_type'] == $rt ? 'selected' : '' ?>><?= ucfirst($rt) ?></option><?php endforeach; ?></select></div>
                        <div class="mb-3"><label class="form-label">Bath</label><select name="bath" class="form-select" required><?php for ($b = 1; $b <= 4; $b++): ?><option value="<?= $b ?>" <?= $p['prop_bath'] == $b ? 'selected' : '' ?>><?= $b ?></option><?php endfor; ?></select></div>
                        <div class="mb-3"><label class="form-label">Price</label><input type="number" step="0.01" name="price" class="form-control" value="<?= htmlspecialchars($p['prop_price']) ?>" required></div>
                        <div class="mb-3">
                            <label class="form-label">Upload New Image (Optional)</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="form-text text-muted">Current Image: <a href="<?= htmlspecialchars($p['prop_img']) ?>" target="_blank">View</a></small>
                        </div>
                      </div>
                      <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><button type="submit" name="edit_property" class="btn btn-primary">Save Changes</button></div>
                    </form>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </main>
    </div>
  </div>

  <!-- Add Property Modal -->
  <div class="modal fade" id="addPropertyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" enctype="multipart/form-data">
          <div class="modal-header"><h5 class="modal-title">Add New Property</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
          <div class="modal-body">
            <div class="mb-3"><label class="form-label">Location</label><input type="text" name="location" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Room Type</label><select name="room_type" class="form-select" required><option value="" disabled selected>Select room type...</option><option value="1-bedroom">1-bedroom</option><option value="2-bedroom">2-bedroom</option><option value="3-bedroom">3-bedroom</option><option value="4-bedroom">4-bedroom</option></select></div>
            <div class="mb-3"><label class="form-label">Bath</label><select name="bath" class="form-select" required><option value="" disabled selected>Select number of baths...</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></div>
            <div class="mb-3"><label class="form-label">Price</label><input type="number" step="0.01" name="price" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Property Image</label><input type="file" name="image" class="form-control" required accept="image/*"></div>
          </div>
          <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><button type="submit" name="add_property" class="btn btn-primary">Save Property</button></div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
