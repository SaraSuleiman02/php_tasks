<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 6</title>
</head>

<body>
    <form method="POST">
        <label for="arrayInput">Enter array elements (comma separated):</label>
        <input type="text" name="arrayInput" placeholder="2, 4, 7, 4, 8, 4">
        <input type="submit" value="Submit">
    </form>

    <?php
    function removeDuplicates($array)
    {
        // to remove duplicates
        $uniqueArray = array_unique($array);

        // to have sequential keys
        $uniqueArray = array_values($uniqueArray);

        return $uniqueArray;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userInput = $_POST["arrayInput"];
        $array = explode(',', $userInput);  // Convert the string into an array

        $resultArray = removeDuplicates($array);

        echo "Original array: ";
        print_r($array);

        echo "<br>Array after removing duplicates: ";
        print_r($resultArray);
    }
    ?>

</body>

</html>