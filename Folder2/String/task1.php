<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
</head>

<body>
    <h2>Find First Difference Between Two Strings</h2>
    <form method="post">
        <label for="string1">Enter First String:</label>
        <input type="text" name="string1" required placeholder="e.g. dragonball">
        <br>
        <label for="string2">Enter Second String:</label>
        <input type="text" name="string2" required placeholder="e.g. dragonboll">
        <br>
        <input type="submit" value="Find Difference">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $string1 = $_POST['string1'];
        $string2 = $_POST['string2'];

        for ($i = 0; $i < min(strlen($string1), strlen($string2)); $i++) {
            if ($string1[$i] !== $string2[$i]) {
                echo "First difference between two strings at position $i: \"{$string1[$i]}\" vs \"{$string2[$i]}\"";
                break;
            }
        }
    }
    ?>
</body>

</html>