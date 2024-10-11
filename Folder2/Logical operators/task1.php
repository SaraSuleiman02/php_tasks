<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1 | Logical Statements and Operators</title>
</head>

<body>
    <h2>Check if a specified year is a leap year</h2>

    <form method="POST">
        <label for="year">Enter the year: </label>
        <input type="number" name="year">
        <input type="submit" value="Check!">
    </form>

    <?php
    function isLeapYear($year)
    {
        if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
            return "This year is a leap year.";
        } else {
            return "This year is not a leap year.";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $year = $_POST["year"];
        echo isLeapYear($year);
    }
    
    ?>


</body>

</html>