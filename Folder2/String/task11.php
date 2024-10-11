<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 11</title>
</head>

<body>
    <h2>Print letters from 'a' to 'z'</h2>

    <?php 
        for ($i=ord('a'); $i <= ord('z') ; $i++) { 
            echo chr($i). " ";
        }
    ?>
</body>

</html>