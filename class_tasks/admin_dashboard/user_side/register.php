<?php
ob_start(); // Start output buffering
include '../includes/db.php';
include '../includes/header.php';

// Initialize variables for form data and error messages
$username = $mobile = $email = $password = $verifyPassword = $address = '';
$errors = [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $mobile = trim($_POST['mobile']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $verifyPassword = trim($_POST['verify_password']);
    $address = trim($_POST['address']);

    // Validate fields
    if (empty($username)) {
        $errors['username'] = 'User name is required.';
    }
    if (empty($mobile) || !preg_match('/^[0-9]{10}$/', $mobile)) {
        $errors['mobile'] = 'Valid mobile number is required.';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Valid email is required.';
    }
    if (empty($password) || strlen($password) < 6) {
        $errors['password'] = 'Password must be at least 6 characters.';
    }
    if ($password !== $verifyPassword) {
        $errors['verify_password'] = 'Passwords do not match.';
    }
    if (empty($address)) {
        $errors['address'] = 'Address is required.';
    }

    // Check if there are no errors
    if (empty($errors)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert into the database
        $query = "INSERT INTO users (user_name, user_mobile, user_email, user_password, user_address) VALUES (:name, :mobile, :email, :password, :address)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name', $username);
        $stmt->bindParam(':mobile', $mobile);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':address', $address);

        if ($stmt->execute()) {
            // Redirect to categories page after successful registration
            header('Location: home.php');
            exit();
        } else {
            $errors['general'] = 'Error registering user. Please try again.';
        }
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center">Register</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="mt-4">
        <!-- Username -->
        <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($username); ?>">
            <?php if (isset($errors['username'])): ?>
                <div class="text-danger"><?php echo $errors['username']; ?></div>
            <?php endif; ?>
        </div>

        <!-- Mobile -->
        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo htmlspecialchars($mobile); ?>">
            <?php if (isset($errors['mobile'])): ?>
                <div class="text-danger"><?php echo $errors['mobile']; ?></div>
            <?php endif; ?>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>">
            <?php if (isset($errors['email'])): ?>
                <div class="text-danger"><?php echo $errors['email']; ?></div>
            <?php endif; ?>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            <?php if (isset($errors['password'])): ?>
                <div class="text-danger"><?php echo $errors['password']; ?></div>
            <?php endif; ?>
        </div>

        <!-- Verify Password -->
        <div class="mb-3">
            <label for="verify_password" class="form-label">Verify Password</label>
            <input type="password" name="verify_password" id="verify_password" class="form-control">
            <?php if (isset($errors['verify_password'])): ?>
                <div class="text-danger"><?php echo $errors['verify_password']; ?></div>
            <?php endif; ?>
        </div>

        <!-- Address -->
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" id="address" class="form-control"><?php echo htmlspecialchars($address); ?></textarea>
            <?php if (isset($errors['address'])): ?>
                <div class="text-danger"><?php echo $errors['address']; ?></div>
            <?php endif; ?>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Register</button>

        <!-- General Error Message -->
        <?php if (isset($errors['general'])): ?>
            <div class="text-danger mt-3"><?php echo $errors['general']; ?></div>
        <?php endif; ?>
    </form>
</div>

<?php include '../includes/footer.php'; ?>