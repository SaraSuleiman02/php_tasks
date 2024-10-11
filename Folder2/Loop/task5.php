<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5 | Loops</title>
</head>

<body>
    <h2>Printing a pattern</h2>

    <form method="POST">
        <label for="rows">Enter the number of rows: </label>
        <input type="number" name="rows">
        <input type="submit" value="Generate!">
    </form>

    <?php
    function printDiamondPattern($n)
    {
        $letters = range('A', 'Z');

        // Top part of the pattern (including the middle line)
        for ($i = 1; $i <= $n; $i++) {
            for ($j = $i; $j < $n; $j++) {
                echo "&nbsp;&nbsp;";
            }

            // Print letters from A up to the current row number
            for ($k = 0; $k < $i; $k++) {
                echo $letters[$k] . " ";
            }

            echo "<br>";
        }

        // Bottom part of the pattern (excluding the middle line)
        for ($i = $n - 1; $i >= 1; $i--) {
            for ($j = $n; $j > $i; $j--) {
                echo "&nbsp;&nbsp;";
            }

            for ($k = 0; $k < $i; $k++) {
                echo $letters[$k] . " ";
            }

            echo "<br>";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rows = $_POST["rows"];
        printDiamondPattern($rows);
    }

    ?>

</body>

</html>