<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Last Three Characters</title>
</head>
<body>
    <h2>Get Last Three Characters from a String</h2>
    <form method="post">
        <label for="inputString">Enter a string:</label>
        <input type="text" name="inputString" required placeholder="e.g. info@orange.com">
        <br>
        <input type="submit" value="Get Last Three Characters">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $inputString = $_POST['inputString'];

        $lastThreeCharacters = substr($inputString, -3);

        echo "Last Three Characters: $lastThreeCharacters";
    }
    ?>
</body>
</html>
