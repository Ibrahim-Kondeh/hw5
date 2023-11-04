<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
    <script>
        function greetUser() {
            var name = prompt("Enter your name:");
            if (name) {
                alert("Hello, " + name + "!");
            }
        }

        function checkGrades() {
            var grades = document.getElementById("grades").value;
            alert("Your grades: " + grades);
        }

        function calculateGPA() {
            var grades = document.getElementById("grades").value.split(",");
            var creditHours = document.getElementById("creditHours").value.split(",");
            var totalPoints = 0;
            var totalCreditHours = 0;

            for (var i = 0; i < grades.length; i++) {
                totalPoints += parseFloat(grades[i]) * parseFloat(creditHours[i]);
                totalCreditHours += parseFloat(creditHours[i]);
            }

            var gpa = totalPoints / totalCreditHours;
            alert("Your GPA is: " + gpa.toFixed(2));
        }

        function calculateAverage() {
            var grades = document.getElementById("grades").value.split(",");
            var total = 0;

            for (var i = 0; i < grades.length; i++) {
                total += parseFloat(grades[i]);
            }

            var average = total / grades.length;
            alert("Average grade: " + average.toFixed(2));
        }

        function findHighestGrade() {
            var grades = document.getElementById("grades").value.split(",");
            var highestGrade = Math.max(...grades);
            alert("Highest grade: " + highestGrade);
        }

        function findLowestGrade() {
            var grades = document.getElementById("grades").value.split(",");
            var lowestGrade = Math.min(...grades);
            alert("Lowest grade: " + lowestGrade);
        }
    </script>
</head>

<body>
    <h1>Welcome to the Grade Calculator!</h1>
    <form action="grades.php" method="post">
        <label for="grades">Enter your grades (comma-separated):</label>
        <input type="text" id="grades" name="grades">
        <button type="button" onclick="checkGrades()">Check Grades</button>
    </form>
    <form action="gpa.php" method="post">
        <label for="grades">Enter your grades (comma-separated):</label>
        <input type="text" id="grades" name="grades">
        <br>
        <label for="creditHours">Enter your credit hours (comma-separated):</label>
        <input type="text" id="creditHours" name="creditHours">
        <button type="button" onclick="calculateGPA()">Calculate GPA</button>
        <button type="button" onclick="calculateAverage()">Calculate Average</button>
        <button type="button" onclick="findHighestGrade()">Find Highest Grade</button>
        <button type="button" onclick="findLowestGrade()">Find Lowest Grade</button>
    </form>

    <button type="button" onclick="greetUser()">Greet Me</button>
</body>

</html>
