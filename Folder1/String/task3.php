<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Word in Sentence</title>
</head>

<body>
    <h2>Check for a Specific Word in a Sentence</h2>
    <form method="post">
        <label for="sentence">Enter a sentence:</label>
        <input type="text" name="sentence" required placeholder="e.g. I am a full stack developer at orange coding academy">
        <br>
        <label for="word">Enter a word to search for:</label>
        <input type="text" name="word" required placeholder="e.g. Orange">
        <br>
        <input type="submit" value="Check">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $sentence = $_POST['sentence'];
        $word = $_POST['word'];

        // Check if the word exists in the sentence
        if (stripos($sentence, $word) !== false) {
            echo "Word Found!";
        } else {
            echo "Word Not Found.";
        }
    }
    ?>
</body>

</html>