<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3</title>
</head>
<body>
    <h2>Print Next Letter</h2>
    <form method="POST">
        <label for="letter">Enter a letter:</label>
        <input type="text" name="letter" required maxlength="1">
        <br>
        <input type="submit" value="Get Next Letter">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $letter = $_POST['letter'];
        if ($letter === 'z') {
            echo "Next letter: a";
        } elseif ($letter === 'Z') {
            echo "Next letter: A";
        } else {
            // ord takes the char and return it's ASCII code
            $nextLetter = chr(ord($letter) + 1);
            echo "Next letter: $nextLetter";
        }
    }
    ?>
</body>
</html>