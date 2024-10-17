<?php
include '../includes/db.php';
include '../includes/header.php';

// Fetch all items
$query = 'SELECT * FROM item';
$stmt = $pdo->prepare($query);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mt-5 mb-5">
    <h2>Manage Items</h2>
    <a href="../feature/create_item.php" class="btn btn-primary mb-3">Add New Item</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Total Number</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item):
                if ($item['state'] == 1) { ?>

                    <tr>
                        <td><?php echo $item['item_id']; ?></td>
                        <td><?php echo $item['item_name']; ?></td>
                        <td><?php echo $item['item_description']; ?></td>
                        <td><img src="<?php echo $item['item_image']; ?>" alt="item image" style="width: 50px;"></td>
                        <td><?php echo $item['item_total_number']; ?></td>
                        <td>
                            <a href="../feature/edit_item.php?id=<?php echo $item['item_id']; ?>" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <a href="../feature/delete_item.php?id=<?php echo $item['item_id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
            <?php
                }
            endforeach;
            ?>
        </tbody>
    </table>
</div>

<?php include("../includes/footer.php") ?>