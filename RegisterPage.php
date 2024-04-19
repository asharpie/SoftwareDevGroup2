<?php
require '/home/group2/public_html/connect.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $userType = $_POST["userType"];
    $password = $_POST["password"];

    // Define allowed email domains based on user types
    $allowedDomains = [
        "student" => "@go.olemiss",
        "TA" => "@go.olemiss",
        "professor" => "@olemiss"
    ];

    // Extract domain from the email
    $emailDomain = substr(strrchr($email, "@"), 1);

    // Check if the email domain matches the allowed domain for the user type
    if (!isset($allowedDomains[$userType]) || strpos($email, $allowedDomains[$userType]) === false) {
        echo '<script>';
        echo 'alert("Invalid email domain for selected user type.");';
        echo '</script>';
    } else {
        // Check if email with the same user type already exists
        $checkQuery = 'SELECT COUNT(*) FROM UserAccount WHERE um_email = :email AND user_type = :userType';
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bindParam(':email', $email);
        $checkStmt->bindParam(':userType', $userType);
        $checkStmt->execute();
        $count = $checkStmt->fetchColumn();

        if ($count > 0) {
            echo '<script>';
            echo 'alert("A user with that email and user type already exists.");';
            echo '</script>';
        } else {
            // Insert the new user into the database
            $query = 'INSERT INTO UserAccount (um_email, user_type, password) VALUES (:email, :userType, :password)';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':userType', $userType);
            $stmt->bindParam(':password', $password);

            try {
                $stmt->execute();
                // Redirect to login page after successful registration
                header("Location: LoginPage.php");
                exit();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up - Ole Miss Notes Center</title>
<style>
:root {
    --background-color: white;
    --text-color: black;
    --button-color: #800000;
    --button-hover-color: #a00000;
}
body {
    background-color: var(--background-color);
    color: var(--text-color);
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin-top: -80px;
}

.form-container {
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    text-align: center;
}
.header {
    background-color: var(--button-color);
    color: white;
    padding: 20px;
    text-align: center;
    width: 100%;
}
.footer {
    background-color: var(--button-color);
    color: white;
    padding: 20px;
    text-align: center;
    width: 100%;
    position: fixed;
    bottom: 0;
}
.input-group {
    margin-bottom: 20px;
}
.input-group label {
    display: block;
    margin-bottom: 5px;
}
.input-group input[type="text"],
.input-group input[type="password"],
.input-group input[type="confirmassword"] {
    width: 90%;
    padding: 10px;
    border-radius: 5px;
    border: none;
    background-color: #ddd;
    color: #333;
}
.button {
    background-color: var(--button-color);
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    margin-top: 10px;
}
.button:hover {
    background-color: var(--button-hover-color);
}
.error-message {
    color: red;
    margin-top: 5px;
}
h2 {
    text-align: center;
}

</style>
</head>
<body>
<div class="header">
    <h1>Ole Miss Notes Center</h1>
</div>

<div class="container">
    <div class="form-container">
        <form id="RegisterForm" action="RegisterPage.php" method="post">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>
            <div class="input-group">
                <label for="userType">I am a:</label>
                <select name="userType" id="userType">
                    <option value="student">Student</option>
                    <option value="ta">TA</option>
                    <option value="professor">Professor</option>
                </select>
            </div>
            <div class="error-message" id="passwordError"></div>
            <div class="error-message"><?php echo $error; ?></div>
            <button type="submit" class="button">Sign Up</button>
        </form>
        <button class="button" onclick="redirectToLoginPage()">Already have an account?</button>
    </div>
</div>
<div class="footer">
    &copy; 2024 Ole Miss Notes Center
</div>

<script>
        document.getElementById('RegisterForm').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                document.getElementById('passwordError').innerText = 'Passwords do not match';
                event.preventDefault();
            } else {
                document.getElementById('passwordError').innerText = '';
            }
        });

        function redirectToLoginPage() {
            window.location.href = "LoginPage.php";
        }
</script>


</body>
</html>
