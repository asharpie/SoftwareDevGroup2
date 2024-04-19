
<?php
require '/home/group2/public_html/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the login form
    $email = $_POST["email"];
    $password = $_POST["password"];
    $userType = $_POST["userType"];

    try {
        // Prepare SQL query to fetch user from database
        $stmt = $conn->prepare("SELECT * FROM UserAccount WHERE um_email = :email AND password = :password AND user_type = :userType");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':userType', $userType);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            // User credentials are correct, redirect based on user type
            if ($userType === 'student') {
                header("Location: Studentpage.php");
                exit();
            } elseif ($userType === 'ta') {
                header("Location: TaPage.php");
                exit();
            } elseif ($userType === 'professor') {
                header("Location: TeacherPage.php");
                exit();
            } elseif ($userType === 'admin') {
                header("Location: AdminHomepage.php");
                exit();
            }
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
<title>Login - Ole Miss Notes Center</title>
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
.input-group input[type="password"] {
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
</style>
</head>
<body>
<div class="header">
    <h1>Ole Miss Notes Center</h1>
</div>
<div class="container">
    <div class="form-container">
        <form id="loginForm" action="LoginPage.php" method="post">
            <div class="input-group">
                <label for="email">Ole Miss Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="userType">I am a:</label>
                <select name="userType" id="userType">
                    <option value="student">Student</option>
                    <option value="ta">TA</option>
                    <option value="professor">Professor</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="button">Login</button>
        </form>
        <div>
            <button class="button" onclick="forgotPassword()">Forgot Password</button>
            <button class="button" onclick="createAccount()">Create New Account</button>
        </div>
    </div>
</div>
<div class="footer">
    &copy; 2024 Ole Miss Notes Center
</div>

<script>
document.getElementById("loginForm").addEventListener("submit", function(event){
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var userType = document.getElementById("userType").value;
    // Redirect to selected account type
    if (userType === 'student') {
        window.location.href = "studentpage.php";
    } else if (userType === 'ta') {
        window.location.href = "TAPage.php";
    } else if (userType === 'teacher') {
        window.location.href = "teacherPage.php";
    } else if (userType === 'admin') {
        window.location.href = "AdminHomePage.php";
    }
});

function forgotPassword() {
    window.location.href = "ForgotPassword.php";
}

function createAccount() {
    window.location.href = "RegisterPage.php";
}
</script>

</body>
</html>
