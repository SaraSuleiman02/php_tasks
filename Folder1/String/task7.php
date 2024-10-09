<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Random Password</title>
</head>

<body>
    <h2>Generate Random Password from Given String</h2>
    <form method="post">
        <label for="inputString">Enter characters to generate password:</label>
        <input type="text" name="inputString" required placeholder="e.g. 1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz">
        <br>
        <label for="length">Password Length:</label>
        <input type="number" name="length" required min="1" placeholder="e.g. 8">
        <br>
        <input type="submit" value="Generate Password">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $inputString = $_POST['inputString'];
        $length = (int)$_POST['length'];
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, strlen($inputString) - 1); 
            $password .= $inputString[$randomIndex];
        }

        echo "Generated Password: $password";
    }
    ?>
</body>

</html>