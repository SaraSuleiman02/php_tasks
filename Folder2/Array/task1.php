<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1 | Array</title>
</head>

<body>
    <h2>Convert all the strings to lower case</h2>

    <?php
    function convertToLowercase($array)
    {
        // Used array_map to apply strtolower to each element of the array
        return array_map('strtolower', $array);
    }

    $colors = array("RED", "BLUE", "WHITE", "YELLOW");

    $lowercaseColors = convertToLowercase($colors);

    echo "<h3> Array before converting: </h3>";
    echo "Array<br>(<br>";
    foreach ($colors as $color) {
        echo "  $color<br>";
    }
    echo ")";

    echo "<h3> Array after converting: </h3>";
    echo "Array<br>(<br>";
    foreach ($lowercaseColors as $color) {
        echo "  $color<br>";
    }
    echo ")";
    ?>



</body>

</html>