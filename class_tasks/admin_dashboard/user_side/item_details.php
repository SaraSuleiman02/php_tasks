<?php
include '../includes/db.php';
include '../includes/header.php';

$item_id = $_GET['id'];
$query = "SELECT * FROM item WHERE item_id = :item_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':item_id', $item_id);
$stmt->execute();
$item = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];  // Assuming user is logged in
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    $query = "INSERT INTO basket (user_id, item_id, quantity) VALUES (:user_id, :item_id, :quantity)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':item_id', $item_id);
    $stmt->bindParam(':quantity', $quantity);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Item added to basket!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error adding item to basket.</div>";
    }
}
?>

<div class="container " style="margin-bottom: 160px; margin-top: 100px;">
    <div class="row">
        <!-- Left column for the image -->
        <div class="col-md-6">
            <img src="<?php echo $item['item_image']; ?>" class="img-fluid" alt="Item Image" style="max-height: 300px; width: auto;">
        </div>

        <!-- Right column for the details -->
        <div class="col-md-6">
            <h2><?php echo $item['item_name']; ?></h2>
            <p><?php echo $item['item_description']; ?></p>
            <p><strong>Price: </strong>$<?php echo $item['price']; ?></p>

            <!-- Add to Cart form -->
            <form method="POST" action="">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Add to Cart</button>
            </form>
        </div>
    </div>
</div>

<?php include("../includes/footer.php"); ?>