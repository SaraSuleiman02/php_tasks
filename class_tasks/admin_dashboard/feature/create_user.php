<?php
include '../includes/db.php';

$response = ['status' => 'error', 'message' => 'Failed to create user'];

if (isset($_POST['user_name']) && isset($_POST['user_mobile']) && isset($_POST['user_email']) && isset($_POST['user_address'])) {
    $name = $_POST['user_name'];
    $mobile = $_POST['user_mobile'];
    $email = $_POST['user_email'];
    $address = $_POST['user_address'];

    $query = 'INSERT INTO users (user_name, user_mobile, user_email, user_address) VALUES (:name, :mobile, :email, :address)';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':mobile', $mobile);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);

    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'User created successfully!';
    }
}

header('Content-Type: application/json');
echo json_encode($response);
