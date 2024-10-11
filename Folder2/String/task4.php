<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 4</title>
</head>

<body>
    <h1></h1>

    <?php
    $originalString = 'The brown fox';
    $insertString = 'quick';
    $position = strpos($originalString, 'brown'); // Find the position to insert

    $newString = substr_replace($originalString, $insertString . ' ', $position, 0); 
    echo "<b>Before adding the string:</b> $originalString <br>";
    echo "<b>After adding the string:</b> $newString";
    ?>

</body>

</html>