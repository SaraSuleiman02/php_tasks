<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3 | Array</title>
</head>

<body>
    <h2>Get the shortest and longest string length from an array</h2>
    <?php
    function findShortestAndLongestLength($words)
    {
        // Initialize the shortest and longest lengths
        $shortest = strlen($words[0]);
        $longest = strlen($words[0]);

        foreach ($words as $word) {
            $length = strlen($word);

            if ($length < $shortest) {
                $shortest = $length;
            }

            if ($length > $longest) {
                $longest = $length;
            }
        }

        echo "The shortest array length is $shortest. The longest array length is $longest.";
    }

    $words = array("abcd", "abc", "de", "hjjj", "g", "wer");

    echo "<h3> The Array: </h3>";
    echo "Array(";
    foreach ($words as $word) {
        echo "  $word,";
    }
    echo ") <br>";
    findShortestAndLongestLength($words);
    ?>

</body>

</html>