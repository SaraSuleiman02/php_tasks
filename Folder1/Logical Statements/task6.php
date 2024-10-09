<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 6</title>
</head>

<body>
    <h2>Simple Calculator</h2>
    <form method="post">
        <input type="number" name="num1" required placeholder="First Number">
        <input type="number" name="num2" required placeholder="Second Number">
        <br>
        <select name="operation" required>
            <option value="">Select Operation</option>
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
        </select>
        <br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    function calculate($num1, $num2, $operation)
    {
        switch ($operation) {
            case 'add':
                return $num1 + $num2;
            case 'subtract':
                return $num1 - $num2;
            case 'multiply':
                return $num1 * $num2;
            case 'divide':
                return $num2 != 0 ? $num1 / $num2 : 'Cannot divide by zero';
            default:
                return 'Invalid operation';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];

        $result = calculate($num1, $num2, $operation);
        echo "Result: " . $result;
    }
    ?>
</body>

</html>