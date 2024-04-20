<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to login page if user is not logged in
    header("Location: LoginPage.php");
    exit();
}

// Retrieve user ID from session
$userID = $_SESSION['user']['user_id'];

function getClasses($userID){
    require '/home/group2/public_html/connect.php';
    // Prepare SQL query to fetch class IDs for the logged-in user
    $query = 'SELECT class_id FROM MyClasses WHERE user_id = ?';
    $stmt = $conn->prepare($query);
    $stmt->execute([$userID]);

    // Initialize an array to store class IDs
    $classIDs = [];

    // Fetch all class IDs associated with the user
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $classIDs[] = $row['class_id'];
    }

    // If no classes found, display a message or return early
    if (empty($classIDs)) {
        echo '<p>No classes found.</p>';
        return;
    }

    // Prepare SQL query to fetch class details for each class ID
    $query = 'SELECT * FROM Classes WHERE class_id IN (' . implode(',', $classIDs) . ')';
    $stmt = $conn->query($query);

    // Display classes
    echo '<ul class="class-list">';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<li class="class-container">'; // Added class-container for each class
        echo '<button class="class-button" onclick="redirectToClassDetails(' . $row['class_id'] . ')">';
        echo '<h2>' . htmlspecialchars($row['class_name']) . '</h2>';
        echo '<p>' . htmlspecialchars($row['class_term']) . '</p>';
        echo '<p>' . htmlspecialchars($row['class_professor']) . '</p>';
        echo '</button>';
        echo '</li>';
    }
    echo '</ul>';
}

?>

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
        .class-button {
            background-color: #121664; /* Green background */
            color: white; /* White text */
            padding: 10px 20px; /* Padding */
            border: none; /* No border */
            cursor: pointer; /* Cursor style */
            border-radius: 5px; /* Rounded corners */
            font-size: 16px; /* Font size */
            width: 1200px; /* Button width */
            margin-top: 2px;
        }

        /* Hover effect */
        .class-button:hover {
            background-color: #272A67; /* Darker green background on hover */
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="back-button">
            <button onclick="goBack()">Sign Out</button>
        </div>
        <h1>Ole Miss Notes Center</h1>
        <div class="user-info" style="color: black;">
        <?php
        if (isset($_SESSION['user']['um_email'])) {
            echo 'Logged in as: ' . htmlspecialchars($_SESSION['user']['um_email']);
        } else {
            echo 'User email not found';
        }
        ?>
    </div>
    </div>

    <div class="container">
        <div class="container">
            <h2>My Classes</h2>
            <?php
            // Call the getClasses() function to display classes for the logged-in user
                getClasses($userID);
            ?>
        </div>

    </div>

    <!-- Footer Bar -->
    <div class="footer">
        <div class="button-box">
            <button onclick="goToReport()">Report</button>
        </div>
    </div>

    <script>

        function goToReport() {
            // Redirect to report page or perform any other action
            // Example:
            window.location.href = 'ReportPage.php';
        }

        function goBack() {
            // Make an AJAX request to logout.php to end the session
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "logout.php", true);
            xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Redirect to the login page after the session is destroyed
                window.location.href = 'LoginPage.php';
            }
        };
        xhr.send();
}
    </script>
</body>
</html>
