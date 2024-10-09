<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 8</title>
</head>

<body>
    <?php
    function convertToUpperCase($array)
    {
        // Initialize an empty array to store the uppercase strings
        $upperCaseArray = array();

        foreach ($array as $color) {
            $upperCaseArray[] = strtoupper($color);
        }

        return $upperCaseArray;
    }

    $colors = array("red", "blue", "white", "yellow");

    $upperCaseColors = convertToUpperCase($colors);

    echo "Array <br>( <br>";
    foreach ($upperCaseColors as $color) {
        echo " $color <br>";
    }
    echo ")";
    ?>

</body>

</html>