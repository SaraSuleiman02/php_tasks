<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3</title>
</head>

<body>
    <form method="post">
        <label for="firstNum">Enter the first Number</label>
        <input type="number" name="firstNum" required>
        <br>
        <label for="secondNum">Enter the second number</label>
        <input type="number" name="secondNum" required>
        <br>
        <input type="submit" value="Swap">
    </form>

    <?php
        function swapNumbers (&$x, &$y) {
            $temp = $x;
            $x = $y;
            $y = $temp;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $x = $_POST["firstNum"];
            $y = $_POST["secondNum"];

            echo "Before swap : x = $x, y = $y <br>";
            swapNumbers( $x, $y );
            echo"After swap : x = $x, y = $y";
        }
    ?>
</body>

</html>