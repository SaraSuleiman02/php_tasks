<?php include '../includes/db.php'; ?>
<?php
$id = $_GET['id'];

$query = "SELECT state FROM item WHERE item_id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();

// Fetch the state
$current_state = $stmt->fetchColumn();

if ($current_state !== false) {
    if ($current_state == 1) {
        // Update state to 0
        $update_query = "UPDATE item SET state = 0 WHERE item_id = :id";
        $update_stmt = $pdo->prepare($update_query);
        $update_stmt->bindParam(':id', $id);

        if ($update_stmt->execute()) {
            header('Location: ../views/items.php');
            exit();
        } else {
            echo "Error updating item state.";
        }
    }
} else {
    echo "Item not found.";
}
?>