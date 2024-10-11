<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 6</title>
</head>

<body>
    <h1>PHP Script to Remove Part of a String</h1>

    <?php
    $originalString = 'The quick brown fox jumps over the lazy dog';
    $wordToRemove = 'fox';

    $newString = str_replace($wordToRemove, '', $originalString);

    // remove any extra spaces that may be left behind
    $newString = trim($newString);

    echo "<b>The sentence before removing the word \'fox\': </b>$originalString <br>";
    echo "<b> The sentence after removing the word \'fox\': </b>$newString <br>";
    ?>

</body>

</html>