<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2</title>
</head>

<body>

    <form method="post">
        <label for="inputString">Enter a string</label>
        <input type="text" name="inputString" required>
        <input type="submit" value="Reverse">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputString = $_POST['inputString'];
            $reversedString = strrev($inputString);

            echo "Original String: ". htmlspecialchars($inputString). "<br>";
            echo "Reversed String: ". htmlspecialchars($reversedString) . "<br>";
        }
    ?>
</body>

</html>