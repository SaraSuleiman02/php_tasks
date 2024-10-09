<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Split Numeric String to Time Format</title>
</head>

<body>
    <h2>Convert Numeric String to Time Format</h2>
    <form method="post">
        <label for="numericString">Enter numeric string (HHMMSS):</label>
        <input type="text" name="numericString" required placeholder="e.g. 085119">
        <br>
        <input type="submit" value="Convert">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $numericString = $_POST['numericString'];

        // Check if the input string is valid (6 digits)
        if (preg_match('/^\d{6}$/', $numericString)) {
            // Split the string into hours, minutes, and seconds
            $hours = substr($numericString, 0, 2);
            $minutes = substr($numericString, 2, 2);
            $seconds = substr($numericString, 4, 2);

            // Format the output
            $timeFormat = "$hours:$minutes:$seconds";
            echo "Formatted Time: $timeFormat";
        } else {
            echo "Please enter a valid 6-digit numeric string.";
        }
    }
    ?>
</body>

</html>