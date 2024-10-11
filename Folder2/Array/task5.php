<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5 | Array</title>
</head>

<body>
    <h2>Return the lowest integer in the array that is not 0</h2>
    <?php
    function findLowestNonZero($array)
    {
        // Filter out zeros from the array
        $nonZeroArray = array_filter($array, function ($value) {
            return $value !== 0;
        });

        $lowest = min($nonZeroArray);

        return $lowest;
    }

    $array1 = array(2, 0, 10, 12, 6);
    $output = findLowestNonZero($array1);

    echo "<h3> The Array: </h3>";
    echo "Array(";
    foreach ($array1 as $num) {
        echo "  $num,";
    }
    echo ") <br>";

    echo "The lowest non-zero integer in the array is: " . $output;
    ?>


</body>

</html>