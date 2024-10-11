<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 10</title>
</head>

<body>
    <h2>Remove Commas from a Numeric String</h2>
    <?php
    $numericString = '2,543.12';

    $cleanedNumber = str_replace(',', '', $numericString);

    echo "<b>The number before removing the comma: </b>$numericString <br>";
    echo "<b>The number after removing the comma: </b>$cleanedNumber <br>";
    ?>


</body>

</html>