<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report - Ole Miss Notes Center</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #FFF; /* White background */
            min-height: 100vh; /* Ensure the body takes at least the height of the viewport */
            display: flex;
            flex-direction: column; /* Arrange children vertically */
        }
        .header, .footer {
            background-color: #B30000; /* Dark red for the header and footer */
            color: #FFF;
            padding: 20px; /* Increased padding */
            text-align: center;
            position: relative; /* Added position relative */
        }
        .header h1, .footer h1 {
            font-size: 36px; /* Bigger font size */
            font-weight: bold; /* Bold font weight */
        }
        .footer {
            display: flex;
            justify-content: center; /* Center align items horizontally */
            align-items: center; /* Center align items vertically */
        }
        .footer button {
            background-color: #B30000; /* Dark red for the button */
            color: #FFF;
            padding: 10px 20px; /* Increased padding */
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px; /* Add margin to the button */
        }
        .container {
            text-align: center;
            margin-top: 20px; /* Add some top margin */
            margin-bottom: 20px; /* Add some bottom margin */
            flex-grow: 1; /* Allow container to grow and fill remaining space */
            display: flex;
        }
        .menu {
            width: 200px; /* Set menu width */
            background-color: #EEE; /* Light gray background */
            padding: 20px; /* Increased padding */
            border-right: 1px solid #DDD; /* Add border on the right */
            text-align: left; /* Align text to the left */
        }
        .menu ul {
            padding-left: 0; /* Remove default padding */
        }
        .menu li {
            margin-bottom: 10px; /* Add some bottom margin */
            position: relative;
            cursor: pointer;
        }
        .menu a {
            text-decoration: none;
            color: #333;
        }
        .content {
            flex-grow: 1; /* Allow content to fill remaining space */
            padding: 20px; /* Increased padding */
            text-align: left; /* Align content to the left */
        }
        .content .report-form {
            text-align: left; /* Align form elements to the left */
        }
        .active-reports, .completed-reports {
            display: none; /* Initially hide the reports */
            margin-left: 20px; /* Add margin to the dropdown */
        }
        .active-reports li, .completed-reports li {
            font-weight: bold; /* Make report items bold */
            font-size: 18px; /* Increase font size of report items */
        }
        .menu ul ul {
            margin-left: 20px;
        }
        .back-button {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="back-button"> <!-- Added back button -->
            <button onclick="goBack()">Back to Home</button>
        </div>
        <h1>Ole Miss Notes Center</h1>
    </div>

    <div class="container">
        <div class="menu">
            <h2>Reports</h2>
            <ul>
                <li onclick="toggleReports('active')">Active Reports</li>
                <ul class="active-reports">
                    <li><a href="#">Report 1</a></li>
                    <li><a href="#">Report 2</a></li>
                </ul>
                <li onclick="toggleReports('completed')">Completed Reports</li>
                <ul class="completed-reports">
                    <li><a href="#">Report 3</a></li>
                    <li><a href="#">Report 4</a></li>
                </ul>
            </ul>
        </div>

        <div class="content">
            <input type="text" class="report-title-input" placeholder="Report Title">
            <form action="submitReport.php" method="post" class="report-form">
                <label for="reportType">Report Type:</label>
                <select name="reportType" id="reportType">
                    <option value="user">User Report</option>
                    <option value="admin">Admin Report</option>
                    <option value="bug">Bug Report</option>
                    <option value="other">Other</option>
                </select>
                <br>
                <label for="description">Description:</label><br>
                <textarea name="description" id="description" rows="4" cols="50" required></textarea>
                <br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <div class="footer">
        <button onclick="goToSettings()">Settings</button>
    </div>

    <script>
        function toggleReports(type) {
            const activeReports = document.querySelector('.active-reports');
            const completedReports = document.querySelector('.completed-reports');
            if (type === 'active') {
                activeReports.style.display = activeReports.style.display === 'none' ? 'block' : 'none';
                completedReports.style.display = 'none';
            } else if (type === 'completed') {
                completedReports.style.display = completedReports.style.display === 'none' ? 'block' : 'none';
                activeReports.style.display = 'none';
            }
        }
        function goToSettings() {
            window.location.href = 'SettingsLogoutPage.php';
        }
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
