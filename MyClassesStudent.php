<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ole Miss Notes Center</title>
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
            position: relative; /* Ensure relative positioning for child elements */
        }
        .header h1 {
            font-size: 36px; /* Bigger font size */
            font-weight: bold; /* Bold font weight */
            margin-bottom: 0; /* Remove margin to align with back button */
        }
        .back-button {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
        .footer {
            margin-top: auto; /* Push the footer to the bottom */
            display: flex;
            justify-content: center;
            align-items: center;
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
        }
        form {
            display: inline-block;
            margin-bottom: 20px; /* Add some bottom margin */
        }
        input[type="text"] {
            width: 300px; /* Increased width for search bar */
            padding: 10px; /* Increased padding */
            font-size: 16px; /* Increased font size */
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        h2 {
            font-size: 24px; /* Increased font size for My Classes */
            margin-bottom: 10px; /* Add some bottom margin */
        }
        .footer .button-box {
            border: 1px solid #FFF;
            border-radius: 5px;
            padding: 5px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="back-button">
            <button onclick="goBack()">Back to Home</button>
        </div>
        <h1>Ole Miss Notes Center</h1>
    </div>

    <div class="container">
        <!-- Search Bar -->
        <form action="" method="get">
            <input type="text" name="search" placeholder="Search...">
            <select name="filter">
                <option value="all">All</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
                <!-- Add more filter options if needed -->
            </select>
            <button type="submit">Filter</button>
        </form>

        <!-- Title: My Classes -->
        <h2>My Classes</h2>

        <!-- List of Current Classes -->
        <ul>
            <!-- PHP code to fetch and display current classes -->
            <?php
            // Replace this with your actual code to fetch classes
            $classes = []; // Dummy array, replace with actual data from database or wherever you store classes
            foreach ($classes as $class) {
                echo "<li>{$class['name']}</li>"; // Adjust according to your class data structure
            }
            ?>
        </ul>

        <!-- Add Class Button -->
        <button onclick="showAddClassForm()">Add Class</button>

        <!-- Add Class Form (hidden by default) -->
        <div id="addClassForm" style="display: none;">
            <h2>Add Class</h2>
            <form action="addClass.php" method="post"> <!-- Replace addClass.php with your actual PHP file to handle adding class -->
                <label for="classId">Class ID:</label>
                <input type="text" id="classId" name="classId" required>
                <button type="submit">Add</button>
            </form>
        </div>
    </div>

    <!-- Footer Bar -->
    <div class="footer">
        <div class="button-box">
            <button onclick="goToSettings()">Settings</button>
        </div>
        <div class="button-box">
            <button onclick="goToReport()">Report</button>
        </div>
    </div>

    <script>
        function showAddClassForm() {
            document.getElementById('addClassForm').style.display = 'block';
        }
        function goToSettings() {
            // Redirect to settings page or perform any other action
            // Example:
            window.location.href = 'SettingsLogoutPage.php';
        }
        function goToReport() {
            // Redirect to report page or perform any other action
            // Example:
            window.location.href = 'ReportPage.php';
        }
        function goBack() {
            // Redirect to home page or perform any other action
            // Example:
            window.location.href = 'Studentpage.php';
        }
    </script>
</body>
</html>
