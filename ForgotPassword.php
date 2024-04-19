<?php
require '/home/group2/public_html/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the login form
    $email = $_POST["email"];
    $password = $_POST["password"];
    $userType = $_POST["userType"];

    try {
        // Prepare SQL statement to check if the user exists
        $stmt = $conn->prepare("SELECT * FROM UserAccount WHERE um_email = :email AND user_type = :userType");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':userType', $userType);
        $stmt->execute();

        // Fetch a row from the result set
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Prepare SQL query to update password
            $stmt = $conn->prepare("UPDATE UserAccount SET password = :password WHERE um_email = :email AND user_type = :userType");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':userType', $userType);
            $stmt->execute();

            // Redirect to login page after successful password update
            header("Location: LoginPage.php");
            exit();
        } else {
            // User not found or credentials are incorrect
            echo '<script>alert("Email/Password/User Type combination is incorrect.");</script>';
        }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password - Ole Miss Notes Center</title>
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
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin-top: -80px;
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
.form-container {
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    text-align: center;
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
.input-group input[type="confirmPassword"] {
    width: 85%;
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
    padding: 5px 15px;
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
</style>
</head>
<body>
<div class="header">
    <h1>Ole Miss Notes Center</h1>
</div>
<div class="container">
    <div class="form-container">
        <form id="forgotPasswordForm" method="post" action="ForgotPassword.php">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>
            <div id="passwordError" class="error-message"></div>
            <div class="input-group">
                <label for="userType">User Type:</label>
                <select name="userType" id="userType" required>
                    <option value="student">Student</option>
                    <option value="ta">TA</option>
                    <option value="professor">Professor</option>
                </select>
            </div>
            <button type="submit" class="button">Reset Password</button>
        </form>
        <div>
            <button class="button" onclick="redirectToLogin()">Back to Login</button>
            <button class="button" onclick="createAccount()">Create New Account</button>
        </div>
    </div>
</div>

<div class="footer">
    &copy; 2024 Ole Miss Notes Center
</div>

<script>
document.getElementById("forgotPasswordForm").addEventListener("submit", function(event){
    var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                document.getElementById('passwordError').innerText = 'Passwords do not match';
                event.preventDefault();
            } else {
                document.getElementById('passwordError').innerText = '';
            }
});

function redirectToLogin() {
    window.location.href = "LoginPage.php";
}

function createAccount() {
    window.location.href = "RegisterPage.php";
}
</script>
</body>
</html>
