<?php
include '../includes/db.php';
$response = ['status' => 'error', 'message' => 'Failed to delete category'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM category WHERE category_id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        $response['status'] = 'success';
    } else {
        $response['message'] = 'Failed to execute the query.';
    }
}

echo json_encode($response);