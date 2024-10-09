<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 9</title>
</head>

<body>
    <h2>Student Grade Calculator</h2>
    <form method="post">
        <label for="scores">Enter scores (comma separated):</label>
        <input type="text" name="scores" required placeholder="e.g. 60,86,95,63,55,74,79,62,50">
        <br>
        <input type="submit" value="Calculate Grade">
    </form>

    <?php
    function calculateGrade($scores)
    {
        $average = array_sum($scores) / count($scores);

        if ($average < 60) {
            return 'F';
        } elseif ($average < 70) {
            return 'D';
        } elseif ($average < 80) {
            return 'C';
        } elseif ($average < 90) {
            return 'B';
        } else {
            return 'A';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $input = $_POST['scores'];
        $scoresArray = explode(',', $input);

        $scores = [];
        foreach ($scoresArray as $score) {
            $trimmedScore = trim($score); // Trim whitespace
            if (is_numeric($trimmedScore)) { // Check if the score is numeric
                $scores[] = intval($trimmedScore);
            }
        }

        if (!empty($scores)) {
            $grade = calculateGrade($scores);
            echo "The grade is: " . $grade;
        } else {
            echo "Please enter valid scores.";
        }
    }
    ?>
</body>

</html>