<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 4 | Array</title>
</head>

<body>
    <h2>Generate unique random 10 numbers within a specific range</h2>
    <form method="POST">
        <label for="min">Enter Minimum Value:</label>
        <input type="number" name="min" required>
        <br>
        <label for="max">Enter Maximum Value:</label>
        <input type="number" name="max" required>
        <br>
        <input type="submit" value="Generate!">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $min = intval($_POST['min']);
        $max = intval($_POST['max']);

        if ($max - $min + 1 < 10) {
            echo "The range is too small to generate 10 unique numbers.";
        } else {
            generateUniqueRandomNumbers($min, $max, 10);
        }
    }

    function generateUniqueRandomNumbers($min, $max, $count)
    {
        // Create an array with the specified range
        $numbers = range($min, $max);

        // Shuffle the array to randomize the order
        shuffle($numbers);

        // Get the first 'count' elements from the shuffled array
        $randomNumbers = array_slice($numbers, 0, $count);

        echo "Unique Random Numbers: " . implode(" ", $randomNumbers);
    }
    ?>
</body>

</html>