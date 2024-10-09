<!-- save this as index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
</head>

<body>
    <h1>Check if the sum of two numbers equals 30</h1>
    <form method="POST">
        <label for="firstNum">First Number:</label>
        <input type="number" name="firstNum" required>
        <br>
        <label for="secondNum">Second Number:</label>
        <input type="number" name="secondNum" required>
        <br>
        <input type="submit" value="Check Sum">
    </form>

    <?php
    function checkSumEquals30($firstInteger, $secondInteger)
    {
        $sum = $firstInteger + $secondInteger;
        return ($sum === 30) ? $sum : false;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $firstNum = $_POST['firstNum'];
        $secondNum = $_POST['secondNum'];

        $result = checkSumEquals30($firstNum, $secondNum);
        echo $result !== false ? $result : 'false';
    }
    ?>
</body>

</html>