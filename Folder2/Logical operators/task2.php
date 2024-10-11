<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2 | Logical Statements and Operators</title>
</head>

<body>
    <h2>Check the season based on temperature</h2>

    <form method="POST">
        <label for="temp">Enter the temperature: </label>
        <input type="number" name="temp">
        <input type="submit" value="Check!">
    </form>

    <?php
    function checkSeason($temperature) {
        if ($temperature < 20) {
            return "It is winter.";
        } else {
            return "It is summertime!";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp = $_POST["temp"];
        echo checkSeason($temp);
    }
    
    ?>


</body>

</html>