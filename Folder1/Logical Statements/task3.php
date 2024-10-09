<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3</title>
</head>

<body>
    <h1>Check if an integer is in the range of [20-50] inclusive</h1>
    <form method="POST">
        <label for="num">Enter a Number:</label>
        <input type="number" name="num" required>
        <br>
        <input type="submit" value="Check Sum">
    </form>

    <?php
    function isInRange($number) {
        return ($number >= 20 && $number <= 50) ? true : false;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $num = $_POST['num'];

        $result = isInRange ($num);
        echo $result !== false ? 'true' : 'false';
    }
    ?>
</body>

</html>