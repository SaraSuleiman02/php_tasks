<?php
include('../layout/header.php');
require('../conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];;

    $query = "SELECT * FROM `users` WHERE `user_id`=:id";

    $statment = $pdo->prepare($query);
    $statment->bindParam(':id', $id, PDO::PARAM_INT);
    $statment->execute();

    $user = $statment->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['update_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $id = $_POST['id'];

    $query = "UPDATE `users` SET `user_name`=:user_name, `user_mobile`=:user_mobile, `user_email`=:user_email, `user_address`=:user_address WHERE `user_id`=:user_id";
    $statment = $pdo->prepare($query);
    $statment->bindParam(':user_name', $name);
    $statment->bindParam(':user_mobile', $mobile);
    $statment->bindParam(':user_email', $email);
    $statment->bindParam(':user_address', $address);
    $statment->bindParam(':user_id', $id);

    if ($statment->execute()) {
        header("Location: ../users.php");
    } else {
        echo "Failed to update data";
    }
}
?>


<div class="container mt-5">
    <form action="update_page.php" method="post">
        <input type="hidden" class="form-control" name="id" id="id" aria-describedby="id"
            value="<?php echo $user['user_id'] ?? ''; ?>">
        <div class="form-group">
            <label for="name">User Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                value="<?php echo $user['user_name'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="email" name="email"
                value="<?php echo $user['user_email'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="mobile">User Mobile</label>
            <input type="text" class="form-control" id="mobile" aria-describedby="mobile" placeholder="mobile" name="mobile"
                value="<?php echo $user['user_mobile'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="address"
                value="<?php echo $user['user_address'] ?? ''; ?>">
        </div>

        <input type="submit" class="btn btn-danger mt-5" name="update_user" value="UPDATE">
        <a href="../users.php" class="btn btn-secondary mt-5">Back</a>
    </form>
</div>


<?php
include('../layout/footer.php');
?>