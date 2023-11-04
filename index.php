<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input[type="text"] {
            width: 100%;
            padding: 8px;
            font-size: 16px;
        }

        .input-group button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .result {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        College Name
    </header>
    <div class="container">
        <div class="input-group">
            <label for="name">Name:</label>
            <input type="text" id="name">
        </div>
        <div class="input-group">
            <label for="studentId">Student ID:</label>
            <input type="text" id="studentId">
        </div>
        <div class="input-group">
            <label for="exam1">Exam 1 (15%):</label>
            <input type="text" id="exam1">
        </div>
        <div class="input-group">
            <label for="exam2">Exam 2 (15%):</label>
            <input type="text" id="exam2">
        </div>
        <div class="input-group">
            <label for="exam3">Exam 3 (15%):</label>
            <input type="text" id="exam3">
        </div>
        <div class="input-group">
            <label for="homework">Homework (30%):</label>
            <input type="text" id="homework">
        </div>
        <div class="input-group">
            <label for="project">Project (20%):</label>
            <input type="text" id="project">
        </div>
        <div class="input-group">
            <label for="participation">Class Participation (5%):</label>
            <input type="text" id="participation">
        </div>
        <button onclick="calculateGrades()">Calculate Grades</button>
        <div class="result" id="result"></div>
    </div>

    <script>
        function calculateGrades() {
            var name = document.getElementById("name").value;
            var studentId = document.getElementById("studentId").value;
            var exam1 = parseFloat(document.getElementById("exam1").value);
            var exam2 = parseFloat(document.getElementById("exam2").value);
            var exam3 = parseFloat(document.getElementById("exam3").value);
            var homework = parseFloat(document.getElementById("homework").value);
            var project = parseFloat(document.getElementById("project").value);
            var participation = parseFloat(document.getElementById("participation").value);

            var totalScore = (exam1 + exam2 + exam3) * 0.15 + homework * 0.3 + project * 0.2 + participation * 0.05;
            var letterGrade = calculateLetterGrade(totalScore);

            var resultMessage = `Hello ${name} (${studentId}),<br><br>`;
            resultMessage += `Total Score: ${totalScore.toFixed(2)}<br>`;
            resultMessage += `Letter Grade: ${letterGrade}<br><br>`;
            resultMessage += `Average Grade: ${calculateAverage(exam1, exam2, exam3, homework, project, participation).toFixed(2)}<br>`;
            resultMessage += `Highest Grade: ${Math.max(exam1, exam2, exam3, homework, project, participation)}<br>`;
            resultMessage += `Lowest Grade: ${Math.min(exam1, exam2, exam3, homework, project, participation)}<br>`;
            resultMessage += `Grades Needed for A: ${calculateGradesNeeded(totalScore, 0.9).toFixed(2)}<br>`;
            resultMessage += `Grades Needed for B: ${calculateGradesNeeded(totalScore, 0.8).toFixed(2)}<br>`;
            resultMessage += `Grades Needed for C: ${calculateGradesNeeded(totalScore, 0.7).toFixed(2)}<br>`;
            resultMessage += `Grades Needed for D: ${calculateGradesNeeded(totalScore, 0.6).toFixed(2)}<br>`;

            document.getElementById("result").innerHTML = resultMessage;
        }

        function calculateLetterGrade(score) {
            if (score >= 0.9) {
                return 'A';
            } else if (score >= 0.8) {
                return 'B';
            } else if (score >= 0.7) {
                return 'C';
            } else if (score >= 0.6) {
                return 'D';
            } else {
                return 'F';
            }
        }

        function calculateAverage(exam1, exam2, exam3, homework, project, participation) {
            var grades = [exam1, exam2, exam3, homework, project, participation];
            var total = 0;
            for (var i = 0; i < grades.length; i++) {
                total += grades[i];
            }
            return total / grades.length;
        }

        function calculateGradesNeeded(currentScore, targetGrade) {
            return (targetGrade - currentScore) / (1 - targetGrade);
        }
    </script>
</body>

</html>
