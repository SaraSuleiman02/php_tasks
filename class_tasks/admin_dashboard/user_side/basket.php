<?php
$query = "SELECT item.item_name, item.item_image, basket.quantity FROM basket 
JOIN item ON basket.item_id = item.item_id WHERE basket.user_id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $_SESSION['user_id']);  // Assuming user is logged in
$stmt->execute();
$basket_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
