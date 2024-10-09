<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function 1</title>
</head>

<body>
    <?php
    function isPrime($number)
    {
        // A prime number is greater than 1
        if ($number <= 1) {
            return false;
        }

        // Check for factors from 2 to the number itself
        for ($i = 2; $i < $number; $i++) {
            if ($number % $i === 0) {
                return false;
            }
        }
        return true;
    }

    
   $inputNumber = 3;
    
    if (isPrime($inputNumber)) {
        echo "$inputNumber is a prime number.\n";
    } else {
        echo "$inputNumber is not a prime number.\n";
    }
    ?>

</body>

</html>