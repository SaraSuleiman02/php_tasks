<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2</title>
</head>

<body>
    <h1>Check if a number is a multiple of 3</h1>
    <form method="POST">
        <label for="num">Enter a Number:</label>
        <input type="number" name="num" required>
        <br>
        <input type="submit" value="Check Sum">
    </form>

    <?php
    function isMultipleOfThree($num) {
        return ($num > 0 && $num % 3 === 0) ? true : false;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $num = $_POST['num'];

        $result = isMultipleOfThree ($num);
        echo $result !== false ? $num : 'false';
    }
    ?>
</body>

</html>