<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 7</title>
</head>

<body>
    <?php
    $array1 = array("color" => "red", 2, 4);

    $array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);

    $merged_array = array_merge($array1, $array2);

    echo "Array\n(\n";
    foreach ($merged_array as $key => $value) {
        echo " [$key] => $value\n";
    }
    echo ")\n";
    ?>

</body>

</html>