<?php
include '../includes/db.php';
include '../includes/header.php';

$category_id = $_GET['id'];
$query = "SELECT * FROM item WHERE category_id = :category_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':category_id', $category_id);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2>Items in Category</h2>
    <div class="row">
        <?php foreach ($items as $item): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo $item['item_image']; ?>" class="card-img-top" alt="Item Image" height="400px">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['item_name']; ?></h5>
                        <p class="card-text"><?php echo $item['item_description']; ?></p>
                        <a href="item_details.php?id=<?php echo $item['item_id']; ?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include("../includes/footer.php"); ?>