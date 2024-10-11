<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1 | Loops</title>
</head>

<body>
    <h2>Calculate and Print the Fibonacci Sequence</h2>

    <?php 
        function fibonacci ($num) {
            $a = 0;
            $b = 1;

            // the first two numbers :
            echo $a . ", " . $b;

            for ($i=2; $i < $num ; $i++) { 
                $nextNum = $a + $b;

                echo ", " . $nextNum;
                $a = $b;
                $b = $nextNum;
            }
        }

        echo "<h3>The first 10 fibonacci Numbers: </h3>";
        fibonacci(10);
    ?>
</body>

</html>