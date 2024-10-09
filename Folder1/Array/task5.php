<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5</title>
</head>

<body>
    <?php
    $fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");

    ksort($fruits);

    foreach ($fruits as $key => $value) {
        echo "$key = $value<br>";
    }
    ?>

</body>

</html>