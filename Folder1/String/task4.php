<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extract File Name from URL</title>
</head>

<body>
    <h2>Extract File Name from URL</h2>
    <form method="POST">
        <label for="url">Enter a URL:</label>
        <input type="text" name="url" required placeholder="e.g. www.orange.com/index.php">
        <br>
        <input type="submit" value="Extract File Name">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $url = $_POST['url'];

        // get the path of the URL
        $path = parse_url($url, PHP_URL_PATH);

        // Extract the file name from the path
        $fileName = basename($path);

        echo "File Name: $fileName";
    }
    ?>
</body>

</html>