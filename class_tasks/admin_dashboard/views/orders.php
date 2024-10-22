<?php include '../includes/db.php'; 

// Fetch all orders with user name, item description, item name, and item image
$query = 'SELECT orders.order_id, users.user_name, item.item_description, 
          item.item_name, item.item_image FROM orders 
          JOIN users ON orders.user_order_id = users.user_id 
          JOIN item ON orders.user_item_order_id = item.item_id';
$stmt = $pdo->prepare($query);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="d-flex">
    <?php include '../includes/sidebar.php' ?>
    <div class="content mt-5">
        <h2 class="text-center">Orders Overview</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User Name</th>
                    <th>Item Name</th>
                    <th>Item Image</th>
                    <th>Item Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['user_name']; ?></td>
                        <td><?php echo $order['item_name']; ?></td>
                        <td><img src="<?php echo $order['item_image']; ?>" alt="Item Image" style="width: 50px;"></td>
                        <td><?php echo $order['item_description']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include("../includes/footer.php"); ?>