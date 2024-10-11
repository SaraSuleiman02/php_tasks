<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5</title>
</head>

<body>
    <h1>PHP Script to Get the First Word of a Sentence</h1>

    <?php
    $sentence = 'The quick brown fox';
    $firstWord = strtok($sentence, ' '); // Get the first word

    echo "<b>The full sentence:</b> $sentence <br>";
    echo "<b>The first word:</b> $firstWord";
    ?>

</body>

</html>