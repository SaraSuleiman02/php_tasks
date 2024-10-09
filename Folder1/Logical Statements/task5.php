<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5</title>
</head>
<body>
    <h2>Electricity Bill Calculator</h2>
    <form method="POST">
        <label for="units">Enter units consumed:</label>
        <input type="number" name="units" required>
        <br>
        <input type="submit" value="Calculate Bill">
    </form>

    <?php
    function calculateElectricityBill($units) {
        $bill = 0;

        if ($units <= 50) {
            $bill = $units * 2.50;
        } elseif ($units <= 150) {
            $bill = (50 * 2.50) + (($units - 50) * 5.00);
        } elseif ($units <= 250) {
            $bill = (50 * 2.50) + (100 * 5.00) + (($units - 150) * 6.20);
        } else {
            $bill = (50 * 2.50) + (100 * 5.00) + (100 * 6.20) + (($units - 250) * 7.50);
        }

        return $bill;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $units = $_POST['units'];
        $billAmount = calculateElectricityBill($units);
        echo "Your electricity bill is: " . number_format($billAmount, 2) . " JOD";
    }
    ?>
</body>
</html>
