<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2 | Array</title>
</head>

<body>
    <h2>Numbers between 200 and 250 that are divisible by 4</h2>

    <?php
    function findDivisibleByFour($start, $end)
    {
        $result = array();

        for ($i = $start; $i <= $end; $i++) {
            if ($i % 4 == 0) {
                $result[] = $i;
            }
        }

        // Output the numbers as a comma-separated string
        echo implode(", ", $result);
    }

    findDivisibleByFour(200, 250);
    ?>

</body>

</html>