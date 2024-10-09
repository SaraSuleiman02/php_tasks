<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 4</title>
</head>

<body>
    <form method="post">
        <label for="num">Enter a number</label>
        <input type="number" name="num" required>
        <input type="submit" value="Check!">
    </form>

    <?php
        function isArmstrong ($num) {
            $sum = 0;
            $temp = $num;
            $numDigits = strlen($num);

            while ($temp > 0) {
                $digit = $temp %10 ; // get the last digit
                $sum += pow($digit, $numDigits);
                $temp = (int) ($temp /10); // to remove the last digit
            }

            if ($sum == $num) {
                return true;
            } else {
                return false;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num = $_POST['num'];
            
            if (isArmstrong($num)) {
                echo "$num is an Armstrong number";
            } else {
                echo "$num is not an Armstrong number";
            }
        }
    ?>
</body>

</html>