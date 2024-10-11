<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 8</title>
</head>

<body>

    <h2>PHP Script to Remove Special Characters from a String</h2>

    <?php
    $originalString = '\"\1+2/3*2:2-3/4*3';

    // remove special characters and replace them with spaces
    $cleanedString = preg_replace('/[^0-9\s]/', ' ', $originalString);

    echo "<b>The sentence before removing Special Characters: </b>$originalString <br>";
    echo "<b> The sentence after removing Special Characters: </b>$cleanedString <br>";
    ?>

</body>

</html>