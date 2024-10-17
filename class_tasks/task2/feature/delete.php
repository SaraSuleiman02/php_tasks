<?php

include('../layout/header.php');
require('../conn.php');


if (isset($_GET['id'])){
    $user_id=$_GET['id'];

    $query="DELETE FROM `users` WHERE `user_id`=:user_id";
    $statment=$pdo->prepare($query);
    $statment->bindParam(':user_id',$user_id,PDO::PARAM_INT);

    if ($statment->execute()) {
        header("Location: ../users.php");
    } else {
        echo "Failed to update data";
    }
}
?>



<?php

include('../layout/footer.php');
?>