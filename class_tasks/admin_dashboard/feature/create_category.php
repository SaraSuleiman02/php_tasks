<?php
include '../includes/db.php';
$response = ['status' => 'error', 'message' => 'Failed to create category'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $query = "INSERT INTO category (category_name, category_description) VALUES (:name, :description)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);

    if ($stmt->execute()) {
        $response['status'] = 'success';
    } else {
        $response['message'] = 'Failed to execute the query.';
    }
}

echo json_encode($response);