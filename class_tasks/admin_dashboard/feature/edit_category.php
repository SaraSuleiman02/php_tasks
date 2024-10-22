<?php
include '../includes/db.php';
$response = ['status' => 'error', 'message' => 'Failed to update category'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $query = "UPDATE category SET category_name = :name, category_description = :description WHERE category_id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);

    if ($stmt->execute()) {
        $response['status'] = 'success';
    } else {
        $response['message'] = 'Failed to execute the query.';
    }
}

echo json_encode($response);