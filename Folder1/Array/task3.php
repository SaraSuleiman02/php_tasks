<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3</title>
</head>

<body>
    <?php
    $color = array(4 => 'white', 6 => 'green', 11 => 'red');

    // reset function here resets the array with the right ascending order of keys 
    $first_color = reset($color);

    echo $first_color;
    ?>

</body>

</html>