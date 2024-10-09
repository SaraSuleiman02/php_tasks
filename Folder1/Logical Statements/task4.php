<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 4</title>
</head>

<body>
    <h1>Find the largest number between three integers</h1>
    <form method="post">
        <label for="numbers">Enter numbers (comma separated):</label>
        <input type="text" name="numbers" required>
        <br>
        <input type="submit" value="Find Largest">
    </form>

    <?php
    function findLargest($numbers)
    {
        return max($numbers);
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $input = $_POST['numbers'];
        $numbersArray = explode(',', $input);

        foreach ($numbersArray as $key => $value) {
            $numbersArray[$key] = trim($value); //trim the white space
        }

        // ensure all elements are numeric
        $numbersArray = array_filter($numbersArray, 'is_numeric');

        if (!empty($numbersArray)) {
            $output = findLargest($numbersArray);
            echo "The largest number is: " . $output;
        } else {
            echo "Please enter valid numbers.";
        }
    }
    ?>
</body>

</html>