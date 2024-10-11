<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 7</title>
</head>

<body>
    <h2>PHP Script to Remove Trailing Dashes from a String</h2>
    <?php
    $originalString = 'The quick brown fox jumps over the lazy dog---';

    // Use rtrim to remove trailing dashes
    $newString = rtrim($originalString, '-');

    echo "<b>The sentence before removing dashes: </b>$originalString <br>";
    echo "<b> The sentence after removing dashes: </b>$newString <br>";
    echo $newString;
    ?>

</body>

</html>