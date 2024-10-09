<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 7</title>
</head>

<body>
    <h2>Check Voting Eligibility</h2>
    <form method="post">
        <label for="age">Enter your age:</label>
        <input type="number" name="age" required>
        <br>
        <input type="submit" value="Check Eligibility">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $age = $_POST['age'];
        if ($age >= 18) {
            echo "You are eligible to vote!";
        } else {
            echo "You are not eligible to vote.";
        }
    }
    ?>
</body>

</html>