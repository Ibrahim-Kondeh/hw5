<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate GPA</title>
</head>

<body>
    <h1>Calculate Your GPA</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $grades = $_POST["grades"];
        $creditHours = $_POST["creditHours"];
        
     
        $gradesArray = explode(",", $grades);
        $creditHoursArray = explode(",", $creditHours);
        $totalPoints = 0;
        $totalCreditHours = 0;
        for ($i = 0; $i < count($gradesArray); $i++) {
            $totalPoints += (float)$gradesArray[$i] * (float)$creditHoursArray[$i];
            $totalCreditHours += (float)$creditHoursArray[$i];
        }
        $gpa = $totalPoints / $totalCreditHours;
        
        echo "Your GPA is: " . number_format($gpa, 2);
    }
    ?>
    <p><a href="index.php">Go back to Home</a></p>
</body>

</html>
