<!DOCTYPE html>
<html>

<head>
    <title>Task 4</title>
</head>

<body>

    <form method="post">
        <label for="position">Enter the position where you want to insert the new item:</label>
        <input type="number" name="position" id="position" required><br>

        <label for="new_item">Enter the new item to insert:</label>
        <input type="text" name="new_item" id="new_item" required><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $array = array(1, 2, 3, 4, 5);

        // Get the input from the form
        $position = (int)$_POST['position'];
        $new_item = $_POST['new_item'];

        // Insert the new item at the specified position
        if ($position >= 1 && $position <= count($array)) {
            array_splice($array, $position - 1, 0, $new_item);

            // Display the updated array
            echo "Updated array: ";
            foreach ($array as $value) {
                echo $value . " ";
            }
        } else {
            echo "Invalid position!";
        }
    }
    ?>

</body>

</html>