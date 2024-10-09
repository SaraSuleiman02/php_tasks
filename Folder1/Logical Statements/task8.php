<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 8</title>
</head>

<body>
    <h2>Check if Number is Positive, Negative, or Zero</h2>
    <form method="post">
        <label for="number">Enter a number:</label>
        <input type="number" name="number" required>
        <br>
        <input type="submit" value="Check">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $number = $_POST['number'];
        if ($number > 0) {
            echo "The number is Positive!";
        } elseif ($number < 0) {
            echo "The number is Negative.";
        } else {
            echo "The number is Zero.";
        }
    }
    ?>
</body>

</html>