<?php
include '../includes/db.php';

$response = ['status' => 'error', 'message' => 'User not found'];

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user by ID
    $query = 'SELECT * FROM users WHERE user_id = :id';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Return the user data as a JSON response
        $response = $user;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
