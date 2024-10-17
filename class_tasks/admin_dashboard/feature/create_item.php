<?php
include '../includes/db.php';
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['item_image'];
    $total_number = $_POST['total_number'];

    // Handle image upload
    $target_dir = "../img/";
    $image_name = time() . '_' . basename($image['name']); // unique name for the image
    $target_image_file = $target_dir . $image_name;
    $image_file_type = strtolower(pathinfo($target_image_file, PATHINFO_EXTENSION));

    // Validate image type (jpg, png, gif)
    $valid_image_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($image_file_type, $valid_image_types)) {
        $error_message = "Only JPG, JPEG, PNG, and GIF files are allowed for item images.";
    } elseif ($image['error'] !== UPLOAD_ERR_OK) {
        $error_message = "Error uploading file: " . $image['error'];
    } elseif (move_uploaded_file($image['tmp_name'], $target_image_file)) {
        $query = "INSERT INTO item (item_name, item_description, item_image, item_total_number) VALUES (:name, :description, :image, :total_number)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image_name);
        $stmt->bindParam(':total_number', $total_number);

        if ($stmt->execute()) {
            header('Location: ../views/items.php');
            exit();
        } else {
            echo "Error inserting item.";
        }
    } else {
        echo $error_message;
    }
}
?>

<div class="container mt-5" style="padding-bottom: 120px;">
    <h2>Add New Item</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Item Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" required>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="item_image">Item Image (JPG, JPEG, PNG)</label>
            <input type="file" class="form-control" name="item_image" id="item_image" accept="image/*" required />
        </div>
        <div class="mb-3">
            <label for="total_number" class="form-label">Total Number</label>
            <input type="number" name="total_number" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
</div>

<?php include("../includes/footer.php"); ?>