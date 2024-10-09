<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Manipulations</title>
</head>
<body>
    <h2>String Manipulations</h2>
    <form method="post">
        <label for="inputString">Enter a string:</label>
        <input type="text" name="inputString" required>
        <br>
        <input type="submit" value="Convert">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $inputString = $_POST['inputString'];

        // Convert to uppercase
        $upperCase = strtoupper($inputString);

        // Convert to lowercase
        $lowerCase = strtolower($inputString);

        // Make the first letter uppercase
        $firstLetterUpper = ucfirst($inputString);

        // Make the first letter of each word capitalized
        $titleCase = ucwords($inputString);

        // Display results
        echo "<h3>Results:</h3>";
        echo "Original String: $inputString <br>";
        echo "Uppercase: $upperCase <br>";
        echo "Lowercase: $lowerCase <br>";
        echo "First Letter Uppercase: $firstLetterUpper <br>";
        echo "Title Case (First Letter of Each Word Capitalized): $titleCase <br>";
    }
    ?>
</body>
</html>