<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 6</title>
</head>

<body>
    <?php
    $temperatures = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62,65, 64, 68, 73, 75, 79, 73);

    // Calculate the average temperature
    $average = array_sum($temperatures) / count($temperatures);

    sort($temperatures);

    // Get the seven lowest temperatures
    $lowest_temps = array_slice($temperatures, 0, 7);

    // Get the seven highest temperatures
    $highest_temps = array_slice($temperatures, -7);

    echo "Average Temperature is: " . number_format($average, 1) . "°F<br>";

    echo "List of seven lowest temperatures: " . implode(", ", $lowest_temps) . "<br>";
    echo "List of seven highest temperatures: " . implode(", ", $highest_temps) . "<br>";
    ?>


</body>

</html>