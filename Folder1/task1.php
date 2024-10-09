<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
</head>
<body>
    <?php 
        $colors = array ('white', 'green', 'red');

        echo '<ul> Colors: <br>';
        foreach ($colors as $color) {
            echo '<li>'. $color .'</li>';
        }
        echo '</ul>';
    ?>
</body>
</html>