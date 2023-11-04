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
       MICHAEL F. PRICE COLLEGE OF BUSINESS
    </header>
    <div class="container">
        <div class="input-group">
            <label for="numClasses">Number of Classes (1-5):</label>
            <input type="number" id="numClasses" min="1" max="5">
        </div>

        <div id="classInputs"></div>

        <button onclick="generateClassInputs()">Generate Class Inputs</button>
        <button onclick="calculateGrades()">Calculate Grades</button>

        <div class="result" id="result"></div>
    </div>

    <script>
        function generateClassInputs() {
            var numClasses = parseInt(document.getElementById("numClasses").value);
            var classInputsDiv = document.getElementById("classInputs");
            classInputsDiv.innerHTML = "";

            for (var i = 1; i <= numClasses; i++) {
                var classInputDiv = document.createElement("div");
                classInputDiv.className = "input-group";
                classInputDiv.innerHTML = `
                    <h3>Class ${i}</h3>
                    <label for="exam${i}">Exam (40%):</label>
                    <input type="number" id="exam${i}" min="0" max="100">
                    <label for="homework${i}">Homework (30%):</label>
                    <input type="number" id="homework${i}" min="0" max="100">
                    <label for="project${i}">Project (20%):</label>
                    <input type="number" id="project${i}" min="0" max="100">
                    <label for="participation${i}">Class Participation (10%):</label>
                    <input type="number" id="participation${i}" min="0" max="100">
                `;
                classInputsDiv.appendChild(classInputDiv);
            }
        }

        function calculateGrades() {
            var numClasses = parseInt(document.getElementById("numClasses").value);
            var totalPercentage = 0;
            var gradesNeeded = [];

            for (var i = 1; i <= numClasses; i++) {
                var exam = parseFloat(document.getElementById(`exam${i}`).value) * 0.4;
                var homework = parseFloat(document.getElementById(`homework${i}`).value) * 0.3;
                var project = parseFloat(document.getElementById(`project${i}`).value) * 0.2;
                var participation = parseFloat(document.getElementById(`participation${i}`).value) * 0.1;

                var classPercentage = exam + homework + project + participation;
                totalPercentage += classPercentage;

                if (classPercentage < 90) {
                    var gradeNeeded = ((90 - classPercentage) / 0.4).toFixed(2);
                    gradesNeeded.push(`Class ${i}: ${gradeNeeded}% needed for 90% overall`);
                }
            }

            var gpa = calculateGPA(totalPercentage / numClasses);
            var resultMessage = `Total Percentage: ${(totalPercentage / numClasses).toFixed(2)}%<br>`;
            if (gradesNeeded.length > 0) {
                resultMessage += "<strong>Grades Needed:</strong><br>";
                gradesNeeded.forEach(function (grade) {
                    resultMessage += `${grade}<br>`;
                });
            }
            resultMessage += `GPA: ${gpa.toFixed(2)}`;

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
    </script>
</body>

</html>
