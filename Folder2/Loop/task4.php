<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 4 | Loops</title>
</head>

<body>
    <h2>Generate and Display the First n Lines of a Floyd Triangle</h2>

    <form method="POST">
        <label for="lines">Enter the number of lines for floyd triangle: </label>
        <input type="number" name="lines">
        <input type="submit" value="Generate!">
    </form>

    <?php
    function floydTriangle($lines)
    {
        $num = 1;

        for ($i = 1; $i <= $lines; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo $num . " ";
                $num++;
            }
            echo "<br>";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lines = $_POST["lines"];
        floydTriangle($lines);
    }

    ?>

</body>

</html>