<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 9</title>
</head>

<body>
    <h2>PHP Script to Select the First 5 Words from a String</h2>

    <?php
    $originalString = 'The quick brown fox jumps over the lazy dog';

    // Split the string into an array of words
    $words = explode(' ', $originalString);

    // Get the first 5 words and join them back into a string
    $firstFiveWords = implode(' ', array_slice($words, 0, 5));

    echo "<b>The sentence: </b>$originalString <br>";
    echo "<b> The first 5 words of the sentence: </b>$firstFiveWords <br>";
    ?>

</body>

</html>