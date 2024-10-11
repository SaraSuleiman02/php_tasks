<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2 | Loops</title>
</head>

<body>
    <h2>Count the "c" Characters</h2>

    <?php
    function countCharC($text)
    {
        $count = 0;
        $textLower = strtolower($text);

        for ($i = 0; $i < strlen($textLower); $i++) {
            if ($textLower[$i] == 'c') {
                $count++;
            }
        }
        return $count;
    }

    $text = "Orange Coding Academy";
    echo "<h4>". $text . "</h4>";
    echo "number of 'c' letter in the sentence is: ". countCharC($text);

    ?>
</body>

</html>