<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3 | Logical Statements and Operators</title>
</head>

<body>
    <h2>Calculate the sum of two integers, and triple the sum if they are the same</h2>

    <form method="POST">
        <label for="fNum">Enter the first number: </label>
        <input type="number" name="fNum">
        <br><br>
        <label for="sNum">Enter the second number: </label>
        <input type="number" name="sNum">
        <br>
        <input type="submit" value="Calculate!">
    </form>

    <?php
    function calculateSum($firstInteger, $secondInteger) {
        $sum = $firstInteger + $secondInteger;
        
        if ($firstInteger == $secondInteger) {
            return ($sum * 3);
        } else {
            return $sum;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fNum = $_POST["fNum"];
        $sNum = $_POST["sNum"];
        echo calculateSum($fNum, $sNum);
    }
    
    ?>


</body>

</html>