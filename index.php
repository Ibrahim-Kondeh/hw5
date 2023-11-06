<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
            text-align: left;
        }

        th, td {
            padding: 10px;
        }

        .result-message {
            margin-top: 20px;
        }

        .calculator {
            float: right;
            margin-top: 20px;
        }
        .custom-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .custom-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <header>
        MICHAEL F. PRICE COLLEGE OF BUSINESS
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

        <table id="resultTable">
            <thead>
                <tr>
                    <th>Class Name</th>
                    <th>Total Percentage</th>
                    <th>Letter Grade</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <div class="result-message" id="resultMessage"></div>

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
                var exam = parseFloat(document.getElementById(`exam${i}`).value) * 0.32;
                var homework = parseFloat(document.getElementById(`homework${i}`).value) * 0.24;
                var project = parseFloat(document.getElementById(`project${i}`).value) * 0.16;
                var participation = parseFloat(document.getElementById(`participation${i}`).value) * 0.08;
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

                var resultTableBody = document.getElementById("resultTable").getElementsByTagName('tbody')[0];
                var newRow = resultTableBody.insertRow();
                var cell1 = newRow.insertCell();
                var cell2 = newRow.insertCell();
                var cell3 = newRow.insertCell();

                cell1.innerHTML = className;
                cell2.innerHTML = classPercentage.toFixed(2) + "%";
                cell3.innerHTML = calculateLetterGrade(classPercentage);
            }

            var overallPercentage = totalPercentage / numClasses;
            var overallGPAValue = totalGradePoints / totalGPAHours;

            var name = document.getElementById("name").value;
            var studentId = document.getElementById("studentId").value;

            var resultMessage = `Hello ${name} (${studentId}),<br><br>`;
            resultMessage += `Overall Percentage: ${overallPercentage.toFixed(2)}%<br>`;
            resultMessage += `Overall GPA: ${overallGPAValue.toFixed(2)}<br>`;
            resultMessage += `Highest Grade: ${highestGrade.toFixed(2)}% (Class: ${highestClass})<br>`;
            resultMessage += `Congratulations for your achievement!<br>`;
            resultMessage += `Lowest Grade: ${lowestGrade.toFixed(2)}% (Class: ${lowestClass})<br>`;
            resultMessage += `Don't worry, keep working hard!<br>`;

            document.getElementById("resultMessage").innerHTML = resultMessage;
        }

        function calculateGPA(percentage) {
            if (percentage >= 89.5) {
                return 4.0;
            } else if (percentage >= 79.5) {
                return 3.0;
            } else if (percentage >= 69.5) {
                return 2.0;
            } else if (percentage >= 59.5) {
                return 1.0;
            } else {
                return 0.0;
            }
        }

        function calculateLetterGrade(percentage) {
            if (percentage >= 89.5) {
                return 'A';
            } else if (percentage >= 79.5) {
                return 'B';
            } else if (percentage >= 69.5) {
                return 'C';
            } else if (percentage >= 59.5) {
                return 'D';
            } else {
                return 'F';
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
