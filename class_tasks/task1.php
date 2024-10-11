<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
    <script>
        function showHideTable() {
            const table = document.getElementById("userTable");
            const button = document.getElementById("toggleButton");

            if (table.style.display === "none") {
                table.style.display = "table"; 
                button.value = "Hide Table"; 
            } else {
                table.style.display = "none"; 
                button.value = "Show Table";
            }
        }
    </script>
</head>

<body>
    <form method="post">
        <label for="name">Name: </label>
        <input type="text" name="name" required>
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" required>
        <br>
        <label for="pass">Password</label>
        <input type="password" name="pass" required>
        <br><br>
        <input type="submit" value="Login">
    </form>

    <?php
    session_start();

    if (!isset($_SESSION["users"])) {
        $_SESSION["users"] = [];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["pass"];

        $user = [
            "name" => $name,
            "email" => $email,
            "password" => $password
        ];

        // Store the user object in the session
        $_SESSION["users"][] = $user;
    }

    if (!empty($_SESSION["users"])) {
        echo "<h2>Registered Users</h2>";
        echo "<input type='button' id='toggleButton' value='Show Table' onclick='showHideTable()'><br><br>";
        echo "<table id='userTable' border='1' style='display: none;'>";  // Initially hidden
        echo "<tr><th>Name</th><th>Email</th><th>Password</th></tr>";

        foreach ($_SESSION["users"] as $user) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user["name"]) . "</td>";
            echo "<td>" . htmlspecialchars($user["email"]) . "</td>";
            echo "<td>" . htmlspecialchars($user["password"]) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    ?>

</body>

</html>