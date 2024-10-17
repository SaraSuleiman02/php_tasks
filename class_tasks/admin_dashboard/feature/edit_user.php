<?php
include '../includes/db.php';

$response = ['status' => 'error', 'message' => 'Failed to update user'];

if (isset($_POST['id']) && isset($_POST['user_name']) && isset($_POST['user_mobile']) && isset($_POST['user_email']) && isset($_POST['user_address'])) {
    $id = $_POST['id'];
    $name = $_POST['user_name'];
    $mobile = $_POST['user_mobile'];
    $email = $_POST['user_email'];
    $address = $_POST['user_address'];

    $query = 'UPDATE users SET user_name = :name, user_mobile = :mobile, user_email = :email, user_address = :address WHERE user_id = :id';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':mobile', $mobile);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':id', $id);

    // Check the statement execution
    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'User updated successfully!';
    } else {
        $errorInfo = $stmt->errorInfo();
        $response['message'] = 'Error updating user: ' . $errorInfo[2];
    }
} else {
    $response['message'] = 'Invalid input data';
}

echo json_encode($response);
?>