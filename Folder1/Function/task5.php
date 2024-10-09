<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5</title>
</head>

<body>
    <?php
    function isPalindrome($string)
    {
        // to Remove spaces, punctuation, and convert to lowercase
        $processedString = strtolower(preg_replace("/[^A-Za-z0-9]/", '', $string));

        // Reverse the string
        $reversedString = strrev($processedString);

        if ($processedString === $reversedString) {
            echo "Yes, it is a palindrome.";
        } else {
            echo "No, it is not a palindrome.";
        }
    }

    // Example usage:
    $input = "Eva, can I see bees in a cave?";
    echo "Example on palindrome <br> The string is : $input  <br>";

    isPalindrome($input);

    echo "<br> Try it If you want! <br>";
    ?>

    <br><br>
    <form method="post">
        Enter A string :
        <input type="text" name="text">
        <input type="submit" value="Check!">
    </form>

    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $input = $_POST['text'];
            isPalindrome($input);
        }
    ?>

</body>

</html>