<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Replace First Word in Sentence</title>
</head>
<body>
    <h2>Replace the First Word of a Sentence</h2>
    <form method="post">
        <label for="sentence">Enter a sentence:</label>
        <input type="text" name="sentence" required placeholder="e.g. That new trainee is so genius.">
        <br>
        <label for="newWord">Enter a new word:</label>
        <input type="text" name="newWord" required placeholder="e.g. Our">
        <br>
        <input type="submit" value="Replace First Word">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $sentence = $_POST['sentence'];
        $newWord = $_POST['newWord'];

        // Split the sentence into words
        $words = explode(' ', $sentence);

        $words[0] = $newWord;

        // Join the words back into a sentence
        $updatedSentence = implode(' ', $words);

        echo "Updated Sentence: $updatedSentence";
    }
    ?>
</body>
</html>
