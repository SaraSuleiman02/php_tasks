<?php
include '../includes/db.php';

$response = ['status' => 'error', 'message' => 'Failed to delete user'];

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Update query to set state to 0
    $query = 'UPDATE users SET state = 0 WHERE user_id = :id';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'User deleted successfully!';
    } else {
        $response['message'] = 'Error executing the update.';
    }
}

echo json_encode($response);
?>