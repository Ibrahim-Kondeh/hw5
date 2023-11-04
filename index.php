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
        .calculator {float: right;}
    </style>
</head>

<body>
    <header>
  MICHALE F. PRICE COLLEGE OF BUSINESS
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
        <div id="classInputs"></div>
        <button onclick="generateClassInputs()">Add Class</button>
        <button onclick="calculateGrades()">Calculate Grades</button>

        <div class="result" id="result"></div>

        <div class="calculator">
            <h3>Calculator</h3>
            <input type="text" id="calcInput">
            <br>
            <button onclick="calculate()">Calculate</button>
            <div id="calcResult"></div>
        </div>
    </div>

    <script>
        function generateClassInputs() {
            var classInputsDiv = document.getElementById("classInputs");
            var classNum = classInputsDiv.children.length + 1;

            var classInputDiv = document.createElement("div");
            classInputDiv.className = "input-group";
            classInputDiv.innerHTML = `
                <h3>Class ${classNum}</h3>
                <label for="className${classNum}">Class Name:</label>
                <input type="text" id="className${classNum}">
                <label for="exam${classNum}">Exam (40%):</label>
                <input type="number" id="exam${classNum}" min="0" max="100">
                <label for="homework${classNum}">Homework (30%):</label>
                <input type="number" id="homework${classNum}" min="0" max="100">
                <label for="project${classNum}">Project (20%):</label>
                <input type="number" id="project${classNum}" min="0" max="100">
                <label for="participation${classNum}">Class Participation (10%):</label>
                <input type="number" id="participation${classNum}" min="0" max="100">
                <label for="gpaHours${classNum}">GPA Hours:</label>
                <input type="number" id="gpaHours${classNum}" min="0">
            `;
            classInputsDiv.appendChild(classInputDiv);
        }

        function calculateGrades() {
            var numClasses = document.getElementById("classInputs").children.length;
            var totalPercentage = 0;
            var highestGrade = 0;
            var lowestGrade = 101;
            var highestClass = "";
            var lowestClass = "";
            var totalGPAHours = 0;
            var totalGradePoints = 0;

            for (var i = 1; i <= numClasses; i++) {
                var className = document.getElementById(`className${i}`).value;
                var exam = parseFloat(document.getElementById(`exam${i}`).value) * 0.4;
                var homework = parseFloat(document.getElementById(`homework${i}`).value) * 0.3;
                var project = parseFloat(document.getElementById(`project${i}`).value) * 0.2;
                var participation = parseFloat(document.getElementById(`participation${i}`).value) * 0.1;
                var gpaHours = parseInt(document.getElementById(`gpaHours${i}`).value);

                var classPercentage = exam + homework + project + participation;
                totalPercentage += classPercentage;

                var classGPA = calculateGPA(classPercentage);
                totalGPAHours += gpaHours;
                totalGradePoints += classGPA * gpaHours;

                if (classPercentage > highestGrade) {
                    highestGrade = classPercentage;
                    highestClass = className;
                }

                if (classPercentage < lowestGrade) {
                    lowestGrade = classPercentage;
                    lowestClass = className;
                }
            }

            var overallPercentage = totalPercentage / numClasses;
            var overallGPA = calculateGPA(overallPercentage);
            var averageScore = totalPercentage / numClasses;
            var overallGPAValue = totalGradePoints / totalGPAHours;

            var name = document.getElementById("name").value;
            var studentId = document.getElementById("studentId").value;

            var resultMessage = `Hello ${name} (${studentId}),<br><br>`;
            resultMessage += `Overall Percentage: ${overallPercentage.toFixed(2)}%<br>`;
            resultMessage += `Overall GPA: ${overallGPA.toFixed(2)}<br>`;
            resultMessage += `Average Score: ${averageScore.toFixed(2)}%<br>`;
            resultMessage += `Highest Grade: ${highestGrade.toFixed(2)}% (Class: ${highestClass})<br>`;
            resultMessage += `Congratulations for your achievement!<br>`;
            resultMessage += `Lowest Grade: ${lowestGrade.toFixed(2)}% (Class: ${lowestClass})<br>`;
            resultMessage += `Don't worry, keep working hard!<br>`;
            resultMessage += `Overall GPA (calculated using provided GPA hours): ${overallGPAValue.toFixed(2)}<br>`;
            
            document.getElementById("result").innerHTML = resultMessage;
        }

        function calculateGPA(percentage) {
            if (percentage >= 90) {
                return 4.0;
            } else if (percentage >= 80) {
                return 3.0 + (percentage - 80) / 10;
            } else if (percentage >= 70) {
                return 2.0 + (percentage - 70) / 10;
            } else if (percentage >= 60) {
                return 1.0 + (percentage - 60) / 10;
            } else {
                return 0.0;
            }
        }

        function calculate() {
            var expression = document.getElementById("calcInput").value;
            try {
                var result = eval(expression);
                document.getElementById("calcResult").innerHTML = `Result: ${result}`;
            } catch (error) {
                document.getElementById("calcResult").innerHTML = "Invalid Expression";
            }
        }
    </script>
</body>

</html>
