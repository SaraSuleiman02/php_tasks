<?php
include '../includes/db.php';
include '../includes/header.php';

// Fetch all categories
$query = "SELECT * FROM category";
$stmt = $pdo->prepare($query);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5" style="margin-bottom: 355px;">
    <h2>Categories</h2>
    <div class="row">
        <?php foreach ($categories as $category): ?>
            <div class="col-md-4">
                <div class="card category-card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $category['category_name']; ?></h5>
                        <p class="card-text"><?php echo $category['category_description']; ?></p>
                        <a href="category_view.php?id=<?php echo $category['category_id']; ?>" class="btn btn-primary">View Category</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include("../includes/footer.php"); ?>