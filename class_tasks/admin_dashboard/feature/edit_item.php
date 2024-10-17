<?php
include '../includes/db.php';
include '../includes/header.php';

$id = $_GET['id'];
$query = "SELECT * FROM item WHERE item_id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$item = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['item_name'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $total_number = $_POST['total_number'];

    $query = "UPDATE item SET item_description = :description, item_image = :image, item_total_number = :total_number WHERE item_id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':total_number', $total_number);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: items.php');
        exit();
    } else {
        echo "Error updating item.";
    }
}
?>

<div class="container mt-5" style="padding-bottom: 175px;">
    <h2>Edit Item</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="item_name" class="form-label">Item Name</label>
            <input type="text" name="item_name" class="form-control" value="<?php echo $item['item_name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" value="<?php echo $item['item_description']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image URL</label>
            <input type="text" name="image" class="form-control" value="<?php echo $item['item_image']; ?>">
        </div>
        <div class="mb-3">
            <label for="total_number" class="form-label">Total Number</label>
            <input type="number" name="total_number" class="form-control" value="<?php echo $item['item_total_number']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
</div>

<?php include '../includes/footer.php';  ?>