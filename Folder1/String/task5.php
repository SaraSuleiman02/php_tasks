<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extract Username from Email</title>
</head>

<body>
    <h2>Extract Username from Email Address</h2>
    <form method="POST">
        <label for="email">Enter an email address:</label>
        <input type="email" name="email" required placeholder="e.g. info@orange.com">
        <br>
        <input type="submit" value="Extract Username">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];

        $username = explode('@', $email)[0];

        echo "Username: $username";
    }
    ?>
</body>

</html>