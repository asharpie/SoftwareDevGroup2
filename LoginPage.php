<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Ole Miss Notes Center</title>
<style>
:root {
    --background-color: white; /* Change background color to white */
    --text-color: black; /* Change text color to black */
    --button-color: #800000; /* Dark red for buttons */
    --button-hover-color: #a00000; /* Darker red for button hover */
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
    background-color: #f0f0f0; /* Lighter background for form */
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
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: none;
    background-color: #ddd; /* Light gray background for input fields */
    color: #333; /* Darker text color for input fields */
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
        <form id="loginForm">
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
                    <option value="teacher">Teacher</option>
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
    event.preventDefault(); // Prevent form submission
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var userType = document.getElementById("userType").value;
    // Here you can add logic to redirect users based on their userType
    if (userType === 'student') {
        window.location.href = "Studentpage.php";
    } else if (userType === 'ta') {
        window.location.href = "TaPage.php";
    } else if (userType === 'teacher') {
        window.location.href = "TeacherPage.php";
    } else if (userType === 'admin') {
        window.location.href = "AdminHomepage.php";
    }
});

function forgotPassword() {
    // Functionality to handle forgot password
}

function createAccount() {
    // Functionality to handle creating a new account
}
</script>
</body>
</html>
